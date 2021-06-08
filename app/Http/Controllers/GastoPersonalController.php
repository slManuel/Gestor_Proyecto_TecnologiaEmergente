<?php

namespace App\Http\Controllers;

use App\Models\Gasto_personal;
use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Cargos;
use App\Models\Proyecto;
use phpDocumentor\Reflection\Types\Boolean;


class GastoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($proy)
    {
        //
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        $data['empleados'] = Empleados::where('emp_estado', 'like', 'Activo')->get();
        $data2['cargos'] = Cargos::all();
        return view('gastospersonal.gastospersonal', $data, $data2)->with('proy', $proy);
    }
    public function indexHP($proy, Request $request)
    {
        //dd($request); 
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }       
        $gastos = Gasto_personal::where('proyecto', '=', $proy)->get();
        $data['gps'] = $gastos;
        $data['cargos'] = Cargos::all();
        //dd($data);
        return view('gastospersonal.historialPagos', $data)->with('proy', $proy);
    }
    /*public function obtener(Request $request)
    {
        $data['gps']=Gasto_personal::where('proyecto', '=', $request->proy)->get();

        $data2['empleados']=Empleados::where('emp_nombre','=',$request->nombre)->where('car_id','=',$request->cargo)->all();
        $data['cargos']=Cargos::all();
        
        return view('gastospersonal.historialPagos',$data,$data2)->with('proy',$request->proy);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($empleado, $proyecto)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        return view('gastospersonal.crearPago')->with('empleado', $empleado)->with('proyecto', $proyecto);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        $fecha = $request->get('gp_fecha');
        $comentario = $request->get('gp_comentario');
        $pago = $request->get('gp_pago');
        if (trim($fecha) != "" && trim($comentario) != "" && trim($pago) != "") {
            //expresion regular para numero double, campo de pago           
            if (preg_match("/^[0-9]{1,25}([.][0-9]{1,2})?$/", $pago)){
                $dataProducts = $request->except('_token', 'saveitem', 'C_guardar');
                //Insertamos el pago del empleado seleccionado       
                Gasto_personal::insert($dataProducts);
                $data['empleados'] = Empleados::all();
                $data2['cargos'] = Cargos::all();
                return view('gastospersonal.gastospersonal', $data, $data2)->with('proy', $request->proyecto);
            }else{
                echo '<script language="javascript">alert("El valor del pago no es válido. Intentelo de nuevo");</script>';
                return view('gastospersonal.crearPago')->with('empleado', $request->empleado)->with('proyecto', $request->proyecto);
            }
        } else {
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            return view('gastospersonal.crearPago')->with('empleado', $request->empleado)->with('proyecto', $request->proyecto);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto_personal $gasto_personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto_personal $gasto_personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        $dataGastos = $request->except('_token');
        $gasto = Gasto_personal::findOrFail($id);
        $gasto->update($request->all());

        $lgastos = Gasto_personal::where('proyecto', '=', $request->proyecto)->get();
        $data['gps'] = $lgastos;
        $data['cargos'] = Cargos::all();
        return view('gastospersonal.historialPagos', $data)->with('proy', $request->proyecto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        $pago = Gasto_personal::find($id);
        $proy = $pago->proyecto;
        $pago->delete();

        $gastos = Gasto_personal::where('proyecto', '=', $proy)->get();
        $data['gps'] = $gastos;
        $data['cargos'] = Cargos::all();
        return view('gastospersonal.historialPagos', $data)->with('proy', $proy);
    }
}
