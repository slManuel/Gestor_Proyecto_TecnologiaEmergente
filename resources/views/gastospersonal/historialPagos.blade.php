@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Historial de pagos</h1>
@stop

@section('content')
<div class="row">
    <table class="table-responsive-md table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cargo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Comentario</th>
                <th scope="col">Pago</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @php($countrow=1)
            @foreach($gps as $g)
            <tr>
                <th scope="row">{{$countrow++}}</th>
                <td>{{$g->_empleado->emp_nombre}}</td>
                <td>{{$g->_empleado->cargo->car_nombre}}</td>
                <td>{{$g->gp_fecha}}</td>
                <td>{{$g->gp_comentario}}</td>
                <td>${{$g->gp_pago}}</td>
                <td>
                    <button id="editar" data-bs-toggle="modal" data-bs-target="#modal-editarGasto{{$g->_id}}">Editar pago</button>
                    <div class="modal fade" id="modal-editarGasto{{$g->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar pagos</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="PUT" action="{{url('/gastospersonal/update/'.$g->_id)}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nombre">Empleado:</label>
                                            <input type="text" value="{{$g->_empleado->emp_nombre}}" class="form-control" readonly id="nombre" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cargo">Cargo:</label>
                                            <input type="text" value="{{$g->_empleado->cargo->car_nombre}}" class="form-control" readonly id="cargo" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" value="{{$g->proyecto}}" name="proyecto" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" value="{{$g->empleado}}" name="empleado" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fecha">Fecha del pago:</label>
                                            <br>
                                            <input type="date" value="{{$g->gp_fecha}}" name="gp_fecha" class="inp" id="fecha" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cm">Comentaro:</label>
                                            <input type="text" value="{{$g->gp_comentario}}" name="gp_comentario" placeholder="Comentario" class="form-control" id="cm" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pago">Pago:</label>
                                            <br>
                                            <input value="{{$g->gp_pago}}" type="number" step="0.01" min="0" name="gp_pago" id="pago" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                                        <input type="submit" id="btn-e-guardarP" value="EDITAR" class="mod-guardar" />
                                    </div>
                                </form>
                            </div>
                        </div>
                </td>
                <td>
                    <button id="eliminar" data-bs-toggle="modal" data-bs-target="#modal-delGasto{{$g->_id}}">Eliminar</button>
                    <div class="modal fade" id="modal-delGasto{{$g->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar pago</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="PUT" action="{{url('gastopersonal/destroy/'.$g->_id)}}">
                                    @csrf
                                    <div class="modal-body">
                                        <h5>Este pago a personal se eliminará de manera permanente</h5>
                                        <p>Estás seguro de eliminar este pago?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal" class="mod-cancelar">No</button>
                                        <input type="submit" id="btn-e-guardarP" value="Si" class="mod-guardar" />
                                    </div>
                                </form>
                            </div>
                        </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<style>
    #filtro-proy {
        border: lightgray 1px solid;
        border-radius: 2px;
        margin-top: 10px;
        padding: 10px;
        margin-bottom: 10px;
    }

    select,
    input {
        width: 200px;
        height: 30px;
        border: lightgray 1px solid;
        border-radius: 4px;
    }

    #btn_buscarpr {
        width: 75px;
        height: 30px;
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 4px;
    }

    #btn_nuevopr {
        width: 200px;
        height: 30px;
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 4px;
    }

    #btn_crear_emp {
        width: 200px;
        height: 30px;
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 4px;
    }

    #detalles {
        width: 80px;
        height: 30px;
        font: bold;
        background: #9cbbac;
        border-radius: 4px;
    }

    #editar,
    #pagos {
        width: 120px;
        height: 30px;
        font: bold;
        background: #c2d4bb;
        border-radius: 4px;
        border: none;
    }

    #eliminar {
        width: 80px;
        height: 30px;
        font: bold;
        color: white;
        border: none;
        background: red;
        border-radius: 4px;
    }

    .mod-cancelar {
        width: 100px;
        height: 30px;
        font: bold;
        background: #c2d4bb;
        border-radius: 3px;
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