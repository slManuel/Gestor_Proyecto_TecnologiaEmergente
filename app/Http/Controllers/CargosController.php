<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$sesion = $request->vsesion()->get('idCarrito');
        //session_start();
        //echo $_SESSION["correo"];
        $nombre= $request->get('contenido__busquedaUnidadesMedida');
        if ($nombre==null) {
            $data['cargos']=Cargos::get();
        }else{
            $data['cargos']=Cargos::car($nombre)->get();
        }
        return view('Cargos.cargos', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function create()
    {
        //
        return view('cargos.crearCargos');    
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
        $nombre= $request->get('car_nombre');
        if ($nombre!=null) {
            $data['cargos']=Cargos::CarNombre($nombre)->get();
        }else{
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $nombre= $request->get('contenido__busquedaUnidadesMedida');
            if ($nombre==null) {
                $data['cargos']=Cargos::get();
            }else{
                $data['cargos']=Cargos::car($nombre)->get();
            }
            return view('Cargos.cargos', $data); 
        }
        if ($data['cargos']=="[]"){
            $dataProducts = $request->except('_token','saveitem','C_guardar');        
            Cargos::insert($dataProducts);
            $data['cargos']=Cargos::paginate(15);
            return view('cargos.cargos', $data);
        }
        else{
            echo '<script language="javascript">alert("No puedes agregar cargos con el mismo nombre");</script>';
            $data['cargos']=Cargos::get();
            return view('cargos.cargos', $data);
        }

        /* $dataProducts = $request->except('_token','saveitem','C_guardar');        
        Cargos::insert($dataProducts);
        $data['cargos']=Cargos::paginate(15);
        return view('Cargos.cargos', $data); */
    }

    /*public function store(Request $request)
    {
        $dataCargos = $request->except('_token','saveitem');
        //Cargos::insert($request);
        $cargo=Cargos::create([
            'car_nombre'=> $request->car_nombre
        ]);
        $data['cargos']=Cargos::paginate(15);
        return view('Cargos.cargos', $data);
        //return redirect('cargos/');

    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function show(Cargos $cargos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargos $cargos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nombre = $request->get('car_nombre');
        $nombreBase = $request->get('car');

        if ($nombre == $nombreBase){
            $dataProducts = $request->except('_token','saveitem');
            $cargos = Cargos::findOrFail($id);
            $cargos->update($request->all());
            $data['cargos']=Cargos::paginate(15);
            return view('cargos.cargos', $data);
        }
        else{
            if ($nombre!=null){
                $data['cargos']=Cargos::CarNombre($nombre)->get();
            }
            if ($data['cargos']=="[]"){
                $dataProducts = $request->except('_token','saveitem');
                $cargos = Cargos::findOrFail($id);
                $cargos->update($request->all());
                $data['cargos']=Cargos::paginate(15);
                return view('cargos.cargos', $data);
            }
            else{
                echo '<script language="javascript">alert("No puedes agregar cargos con el mismo nombre");</script>';
                $data['cargos']=Cargos::get();
                return view('cargos.cargos', $data);
            }
        }
        /* $dataProducts = $request->except('_token','saveitem');
        $cargos = Cargos::findOrFail($id);
     // echo json_encode($request);
        $cargos->update($request->all());

        $data['cargos']=Cargos::paginate(15);
        return view('Cargos.cargos', $data); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargos $cargos)
    {
        //
    }
}
