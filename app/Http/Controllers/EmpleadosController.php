<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Cargos;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {           
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        $nombre= $request->get('nombre');
        $cargo= $request->get('cargo');
        if ($nombre==null && $cargo=="Todos") {
            $data['empleados']=Empleados::get();
        }else{
            $data['empleados']=Empleados::emp($nombre,$cargo)->get();
        }
        //echo ($request);
        $data2['cargos']=Cargos::all();
        return view('empleados.empleados', $data, $data2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        $data['cargos']=Cargos::all();
        return view('empleados.crearEmpleados',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }                
        $dataProducts = $request->except('_token','saveitem','C_guardar');
        $nomb = trim($request->emp_nombre);
        $cel = trim($request->emp_tel);
        //$empleados = Empleados::findOrFail($request->emp_nombre);
        if ($nomb != "" || $cel != ""){
            Empleados::insert($dataProducts);        
            $data['empleados']=Empleados::all();        
            $data2['cargos']=Cargos::all();
            return view('empleados.empleados', $data, $data2);
        }
        else{
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $data['empleados']=Empleados::all();        
            $data2['cargos']=Cargos::all();
            return view('empleados.empleados', $data, $data2);
        }                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }      
        $dataProducts = $request->except('_token','saveitem');
        $nomb = trim($request->emp_nombre);
        $cel = trim($request->emp_tel);
        if($nomb != "" && $cel != ""){
            $empleados = Empleados::findOrFail($id);
     // echo json_encode($request);
            $empleados->update($request->all());

            $data['empleados']=Empleados::all();
            $data2['cargos']=Cargos::all();
            return view('empleados.empleados', $data,$data2);
        }
        else {
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $data['empleados']=Empleados::all();        
            $data2['cargos']=Cargos::all();
            return view('empleados.empleados', $data, $data2);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleados $empleados)
    {
        //
    }
}
