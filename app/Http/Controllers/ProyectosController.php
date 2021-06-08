<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;

class ProyectosController extends Controller
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
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $nombre = $request->get('nombreBusqueda');
        $estado = $request->get('estadoBusqueda');
        if ($nombre == null && $estado == "Todos") {
            $data['proyectos'] = Proyectos::get();
        } else {
            $data['proyectos'] = Proyectos::proy($nombre, $estado)->get();
        }
        return view('proyectos.proyectos', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        return view('proyectos.createProyectos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $dataProducts = $request->except('_token', 'saveitem', 'C_guardar');
        $nomb = trim($request->proy_nombre);
        $inicio = strtotime($request->proy_fechaI);
        $final = strtotime($request->proy_fechaF);
        if ($final == "") {
            if ($nomb != "") {
                $existe = Proyectos::Existe($nomb)->get();
                if ($existe == "[]") {
                    Proyectos::insert($dataProducts);
                    $data['proyectos'] = Proyectos::all();
                    return view('proyectos.proyectos', $data);
                } else {
                    echo '<script language="javascript">alert("Al parecer ya hay un proyecto con ese nombre, intente nuevamente");</script>';
                    $data['proyectos'] = Proyectos::all();
                    return view('proyectos.proyectos', $data);
                }
            } else {
                echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
                return view('proyectos.createProyectos');
            }
        } else {
            if ($inicio <= $final) {
                if ($nomb != "") {
                    $existe = Proyectos::Existe($nomb)->get();
                    if ($existe == "[]") {
                        Proyectos::insert($dataProducts);
                        $data['proyectos'] = Proyectos::all();
                        return view('proyectos.proyectos', $data);
                    } else {
                        echo '<script language="javascript">alert("Al parecer ya hay un proyecto con ese nombre, intente nuevamente");</script>';
                        $data['proyectos'] = Proyectos::all();
                        return view('proyectos.proyectos', $data);
                    }
                } else {
                    echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
                    return view('proyectos.createProyectos');
                }
            } else {
                echo '<script language="javascript">alert("El rango de fechas no es correcto. Intentelo de nuevo");</script>';
                return view('proyectos.createProyectos');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyectos $proyectos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($_SESSION["rol"] == null) {
            return view('auth.login');
        }
        if ($_SESSION["estado"] == "Inactivo") {
            return view('usuarios.inactivo');
        }
        $final = strtotime($request->proy_fechaF);
        $inicio = strtotime($request->proy_fechaI);
        $nomb = trim($request->proy_nombre);
        $original = $request->original;
        if ($nomb != "") {
            if ($final == "") {
                if ($original != $nomb) {
                    $existe = Proyectos::Existe($nomb)->get();
                    if ($existe == "[]") {
                        $proyectos = Proyectos::findOrFail($id);
                        $proyectos->update($request->all());
                        $data['proyectos'] = Proyectos::all();
                        return view('proyectos.proyectos', $data);
                    } else {
                        echo '<script language="javascript">alert("Al parecer ya hay un proyecto con ese nombre, intente nuevamente");</script>';
                        $data['proyectos'] = Proyectos::all();
                        return view('proyectos.proyectos', $data);
                    }
                } else {
                    $proyectos = Proyectos::findOrFail($id);
                    $proyectos->update($request->all());
                    $data['proyectos'] = Proyectos::all();
                    return view('proyectos.proyectos', $data);
                }
            } else {
                if ($inicio <= $final) {
                    if ($original != $nomb) {
                        $existe = Proyectos::Existe($nomb)->get();
                        if ($existe == "[]") {
                            $proyectos = Proyectos::findOrFail($id);
                            $proyectos->update($request->all());
                            $data['proyectos'] = Proyectos::all();
                            return view('proyectos.proyectos', $data);
                        } else {
                            echo '<script language="javascript">alert("Al parecer ya hay un proyecto con ese nombre, intente nuevamente");</script>';
                            $data['proyectos'] = Proyectos::all();
                            return view('proyectos.proyectos', $data);
                        }
                    } else {
                        $proyectos = Proyectos::findOrFail($id);
                        $proyectos->update($request->all());
                        $data['proyectos'] = Proyectos::all();
                        return view('proyectos.proyectos', $data);
                    }
                } else {
                    echo '<script language="javascript">alert("El rango de fechas no es correcto. Intentelo de nuevo");</script>';
                    $data['proyectos'] = Proyectos::all();
                    return view('proyectos.proyectos', $data);
                }
            }
        } else {
            echo '<script language="javascript">alert("No se admiten espacios en blanco. Intentelo de nuevo");</script>';
            $data['proyectos'] = Proyectos::all();
            return view('proyectos.proyectos', $data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyectos $proyectos)
    {
        //
    }
}
