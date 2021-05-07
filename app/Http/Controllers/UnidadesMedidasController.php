<?php

namespace App\Http\Controllers;

use App\Models\UnidadesMedidas;
use Illuminate\Http\Request;

class UnidadesMedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['unidadesmeds']=UnidadesMedidas::paginate(15);
         return view('unidadesmedidas.unidadesmedidas',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidadesmedidas.createumed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataProducts = $request->except('_token','saveitem');
        UnidadesMedidas::insert($dataProducts);
            //return response()->json($dataProducts);
        $data['unidadesmeds']=UnidadesMedidas::paginate(15);
        return view('unidadesmedidas.unidadesmedidas',$data);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnidadesMedidas  $unidadesMedidas
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadesMedidas $unidadesMedidas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnidadesMedidas  $unidadesMedidas
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadesMedidas $unidadesMedidas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnidadesMedidas  $unidadesMedidas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataProducts = $request->except('_token','saveitem');
        $unidades = UnidadesMedidas::findOrFail($id);
     // echo json_encode($request);
        $unidades->update($request->all());

        $data['unidadesmeds']=UnidadesMedidas::paginate(15);
        return view('unidadesmedidas.unidadesmedidas',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadesMedidas  $unidadesMedidas
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadesMedidas $unidadesMedidas)
    {
        //
    }
}
