<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;

class cargosController extends Controller
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
        /*$productos = Productos::all();
        return view('productos.index', $productos);*/
        //return view('Cargos.cargos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //   $dataProducts = $request->except('_token','saveitem');
        //Cargos::insert($dataProducts);
        //return response()->json($dataProducts);
      //  return redirect('productos/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargos $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargos $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //echo json_encode($request);

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
     * @param  \App\Models\modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargos $modelo)
    {
        //
    }
}
