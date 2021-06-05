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
    public function index(Request $request)
    {
        $nombre= $request->get('contenido__busquedaUnidadesMedida');
        if ($nombre==null) {
            $data['unidadesmeds']=UnidadesMedidas::get();
        }else{
            $data['unidadesmeds']=UnidadesMedidas::uni($nombre)->get();
        }
        return view('unidadesmedidas.unidadesmedidas', $data); 
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
        $nomb = trim($request->um_nombre);
        
        if ($nomb != "") {
            $existe=UnidadesMedidas::uni($nomb)->get();

            if ($existe == "[]") {
                UnidadesMedidas::insert($dataProducts);
                $data['unidadesmeds']=UnidadesMedidas::all();
                return view('unidadesmedidas.unidadesmedidas',$data);
            }else{
                echo '<script language="javascript">alert("No puedes agregar unidades de medida con el mismo nombre");</script>';
                $data['unidadesmeds']=UnidadesMedidas::all();
                return view('unidadesmedidas.unidadesmedidas',$data);
            }
        }else{
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $data['unidadesmeds']=UnidadesMedidas::all();
            return view('unidadesmedidas.unidadesmedidas',$data);
        } 
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
        $nomb = trim($request->um_nombre);
        $original = $request->original;
        if ($nomb != "") {
            if ($nomb==$original) {
                    $unidades = UnidadesMedidas::findOrFail($id);
                    $unidades->update($request->all());
                    $data['unidadesmeds']=UnidadesMedidas::all();
                    return view('unidadesmedidas.unidadesmedidas',$data); 
            }else{
                $existe=UnidadesMedidas::uni($nomb)->get();
                if ($existe == "[]") {
                    $unidades = UnidadesMedidas::findOrFail($id);
                    $unidades->update($request->all());
                    $data['unidadesmeds']=UnidadesMedidas::all();
                    return view('unidadesmedidas.unidadesmedidas',$data); 
                }else{
                    echo '<script language="javascript">alert("Esta unidad de medida ya habia sido agregada");</script>';
                    $data['unidadesmeds']=UnidadesMedidas::all();
                    return view('unidadesmedidas.unidadesmedidas',$data);
                }
            }
        }else{
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $data['unidadesmeds']=UnidadesMedidas::all();
            return view('unidadesmedidas.unidadesmedidas',$data);
        }
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
