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
    public function index()
    {
        $data['cargos']=Cargos::paginate(15);
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
<<<<<<< HEAD
        $dataProducts = $request->except('_token','saveitem');
    Cargos::insert($dataProducts);
        //return response()->json($dataProducts);
       $data['cargos']=Cargos::paginate(15);
      return view('Cargos.cargos', $data);
=======
        //
        $dataProducts = $request->except('_token','saveitem','C_guardar');        
        Cargos::insert($dataProducts);
        $data['cargos']=Cargos::paginate(15);
        return view('Cargos.cargos', $data);
>>>>>>> f3cca7e93f354602ea9cf7f61c3f56137e4c29f9
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
        $dataProducts = $request->except('_token','saveitem');
        $cargos = Cargos::findOrFail($id);
     // echo json_encode($request);
        $cargos->update($request->all());

        $data['cargos']=Cargos::paginate(15);
        return view('Cargos.cargos', $data);
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
