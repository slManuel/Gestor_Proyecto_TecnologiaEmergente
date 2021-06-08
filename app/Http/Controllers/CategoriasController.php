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
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
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
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
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
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        $nombre= trim($request->cat_nombre);
        if ($nombre != ""){
            if ($nombre!=null) {
                $data['categorias']=Categorias::CateNombre($nombre)->get();
            }
            if ($data['categorias']=="[]"){
                $dataProducts = $request->except('_token','saveitem','C_guardar');        
                Categorias::insert($dataProducts);
                $data['categorias']=Categorias::paginate(15);
                return view('categorias.categorias', $data);
            }
            else{
                echo '<script language="javascript">alert("No puedes agregar categorías con el mismo nombre");</script>';
                $data['categorias']=Categorias::get();
                return view('categorias.categorias', $data);
            }
        }else{
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $data['categorias']=Categorias::all();
            return view('categorias.categorias',$data);
        }
        
        //$dataProducts = $request->except('_token','saveitem','C_guardar');        
        //Categorias::insert($dataProducts);
        //$data['categorias']=Categorias::paginate(15);
        //return view('categorias.categorias', $data); 
        
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
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        $nombre = trim($request->cat_nombre);
        $nombreBase = $request->get('cat');
        if ($nombre != ""){
            if ($nombre == $nombreBase){
                $dataProducts = $request->except('_token','saveitem');
                $categorias = Categorias::findOrFail($id);
                $categorias->update($request->all());
                $data['categorias']=Categorias::paginate(15);
                return view('categorias.categorias', $data);
            }
            else{
                if ($nombre!=null){
                    $data['categorias']=Categorias::CateNombre($nombre)->get();
                }
                if ($data['categorias']=="[]"){
                    $dataProducts = $request->except('_token','saveitem');
                    $categorias = Categorias::findOrFail($id);
                    $categorias->update($request->all());
                    $data['categorias']=Categorias::paginate(15);
                    return view('categorias.categorias', $data);
                }
                else{
                    echo '<script language="javascript">alert("No puedes agregar categorías con el mismo nombre");</script>';
                    $data['categorias']=Categorias::get();
                    return view('categorias.categorias', $data);
                }
            }
        }
        else {
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $data['categorias']=Categorias::all();
            return view('categorias.categorias',$data);
        }
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
