<?php

namespace App\Http\Controllers;

use App\Models\Gasto_personal;
use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Cargos;
use App\Models\Proyecto;

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
        $data['empleados']=Empleados::paginate(15);
        $data2['cargos']=Cargos::paginate(15);
        return view('gastospersonal.gastospersonal',$data,$data2)->with('proy',$proy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($empleado,$proyecto)
    {        
        return view('gastospersonal.crearPago')->with('empleado',$empleado)->with('proyecto',$proyecto);
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
        //return response()->json($dataProducts);        
        Gasto_personal::insert($dataProducts);        
        $data['empleados']=Empleados::paginate(15);
        $data2['cargos']=Cargos::paginate(15);    
        return view('gastospersonal.gastospersonal',$data,$data2)->with('proy',$request->proyecto);
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
    public function update(Request $request, Gasto_personal $gasto_personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto_personal  $gasto_personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto_personal $gasto_personal)
    {
        //
    }
}
