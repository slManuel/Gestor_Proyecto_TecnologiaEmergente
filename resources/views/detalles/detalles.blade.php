@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Detalles</h1>
@stop

@section('content')
<div class="row">
    <div class="col-2">
        <h4>Balance:</h4>
    </div>
    <div class="col-2">
        @php
        $total=0;
        foreach($detalles as $detalle){$total=$total + $detalle->det_subtotal;}
        @endphp
        $ {{$total}}
    </div>
    <div class="col">
        <input type="button" value="REPORTE" id="btn-rep-detF">
    </div>
    <div class="col">
        <a id="nuevo-reg-detF" class="nuevoregistro" href="{{url('/detalles/create/'.$idfactura)}}">NUEVO REGISTRO</a>
    </div>
</div>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripción</th>
                <th scope="col">Tipo</th>
                <th scope="col">Categoría</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Medida</th>
                <th scope="col">Precio unitario</th>
                <th scope="col">Subtotal</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @php($rowcount=1)
            @foreach($detalles as $detalle)
            <tr>
                <th scope="row">{{$rowcount++}}</th>
                <td>{{$detalle->det_descripcion}}</td>
                <td>{{$detalle->categoria->cat_tipo}}</td>
                <td>{{$detalle->categoria->cat_nombre}}</td>
                <td>{{$detalle->det_cantidad}}</td>
                <td>{{$detalle->unidadesmedidas->um_nombre}}</td>
                <td>${{$detalle->det_preciounitario}}</td>
                <td>${{$detalle->det_subtotal}}</td>
                <td>
                    <button class="boton" id="editar" data-bs-toggle="modal" data-bs-target="#modal-editarDF{{$detalle->_id}}">Editar</button>
                    <div class="modal fade" id="modal-editarDF{{$detalle->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar detalle de factura</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="GET" action="{{url('detalle/actualizar')}}">
                                    @csrf
                                         <div class="mb-3">
                                            <input name="factura_id" value="{{$idfactura}}" hidden>
                                        </div>
                                         <div class="mb-3">
                                            <input name="_id" value="{{$detalle->_id}}" hidden>
                                        </div>
                                        <div class="mb-3">
                                            <input name="det_descripcion" value="{{$detalle->det_descripcion}}" type="text" id="e-des" placeholder="Descripción" class="form-control">
                                        </div>

                                        <label for="cat_id">Categoría:</label>
                                        <div class="mb-3">
                                            <select name="cat_id" id="n-cate">
                                                <option hidden value="{{$detalle->cat_id}}" selected>{{$detalle->categoria->cat_nombre}}</option>
                                                @foreach($categorias as $categoria)
                                                <option value="{{$categoria->_id}}">{{$categoria->cat_nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="um_id">Unidad de medida:</label>
                                        <div class="mb-3">
                                            <select name="um_id" id="n-umedida">
                                                <option hidden value="{{$detalle->um_id}}" selected>{{$detalle->unidadesmedidas->um_nombre}}</option>
                                                @foreach($unidades as $unidad)
                                                <option value="{{$unidad->_id}}">{{$unidad->um_nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="det_cantidad">Cantidad:</label>
                                        <div class="mb-3">
                                            <input name="det_cantidad" value="{{$detalle->det_cantidad}}" type="number" id="n-canidad">
                                        </div>
                                        <label for="det_preciounitario">Precio unitario:</label>
                                        <div class="mb-3">
                                            <input name="det_preciounitario" value="{{$detalle->det_preciounitario}}" type="number" id="n-canidad">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                                            <input type="submit" value="EDITAR"  class="mod-guardar"/>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </td>
                <td>
                <a class="eliminar" id="eliminar" href="{{url('detalle/delete/'.$detalle->_id,$idfactura)}}" >Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<style>
    .nuevoregistro{
        background-color: gainsboro;
        padding: 5px;
        width: 180px;
        margin-left: 0px;
        border-radius: 3px;
        text-decoration: none;
        color: white;
    }
 .eliminar {
        background-color: crimson;
        padding: 3px;
        width: 180px;
        margin-left: 0px;
        border-radius: 3px;
        text-decoration: none;
        color: white;
    }
    a {
        font-family: Arial;
        color: black;
        text-decoration: none;
        box-shadow: 2px 2px 4px gray;
        border-radius: 7px;
    }

    #dash .menu a:hover {
        background: #84a193;
    }

    #dash {
        background: #9cbbac;
        min-height: 100vh;
        width: 21%;
        box-shadow: 4px 4px 7px gray;
    }

    .menu {
        padding-top: 50px;
    }

    i {
        padding-right: 6px;
    }

    #contenido {
        width: 79%;
        padding: 30px;
    }

    #cerrar {
        position: absolute;
        bottom: 0;
    }

    .menu_bar {
        display: none;
    }

   
    select,
    input {
        width: 200px;
        height: 30px;
        border: lightgray 1px solid;
        border-radius: 4px;
    }

    #balance {
        color: green;
    }

    #btn-rep-detF {
        font: bold;
        background: #9cbbac;
        border: none;
    }

    #nuevo-reg-detF {
        font: bold;
        border: none;
        background: #c2d4bb;
    }

    #editar {
        background: #9cbbac;
    }

    .mod-cancelar {
        width: 100px;
        height: 30px;
        font: bold;
        background: #c2d4bb;
        border-radius: 3px;
        border: none;
    }

    .boton {
        width: 75px;
        font: bold;
        border: none;
    }

    .mod-guardar {
        width: 100px;
        height: 30px;
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 3px;
        border: none;
    }
</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
@stop

@section('js')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

@stop