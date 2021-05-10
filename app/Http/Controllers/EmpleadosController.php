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
        $dataProducts = $request->except('_token','saveitem','C_guardar');
        //$empleados = Empleados::findOrFail($request->emp_nombre);
        Empleados::insert($dataProducts);        
        $data['empleados']=Empleados::all();        
        $data2['cargos']=Cargos::all();
        return view('empleados.empleados', $data, $data2);                
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
        $dataProducts = $request->except('_token','saveitem');
        $empleados = Empleados::findOrFail($id);
     // echo json_encode($request);
        $empleados->update($request->all());

        $data['empleados']=Empleados::all();
        $data2['cargos']=Cargos::all();
        return view('empleados.empleados', $data,$data2);
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
