<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre= $request->get('contenido__busquedaUnidadesMedida');
        $estado= $request->get('estadoBusqueda');
        if ($nombre==null && $estado=="Todos") {
            $data['categorias']=Categorias::get();
        }else{
            $data['categorias']=Categorias::cate($nombre,$estado)->get();
        }
        return view('categorias.categorias', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorias.crearCategorias');
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
        Categorias::insert($dataProducts);
        $data['categorias']=Categorias::paginate(15);
        return view('categorias.categorias', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataProducts = $request->except('_token','saveitem');
        $categorias = Categorias::findOrFail($id);
     // echo json_encode($request);
        $categorias->update($request->all());

        $data['categorias']=Categorias::paginate(15);
        return view('categorias.categorias', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categorias)
    {
        //
    }
}
