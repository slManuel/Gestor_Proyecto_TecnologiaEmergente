@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Ingresos y Egresos</h1>
@stop

@section('content')

<div class="row">
    <div class="col-2">
        <h3>Proyecto:</h3>
    </div>
    <div class="col-2">
        <legend id="nombre-proy">{{$proyecto->proy_nombre}}</legend>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="row" id="filtro-proy">
            <form action="{{url('/facturas/'.$proyecto->_id)}}">
                <div class="col-2">
                    <legend>Filtro</legend>
                </div>
                <div class="row">
                <div class="col-6">
                    <select id="fp-estado" name="nombreBusqueda">
                        <option>Todos</option>
                        <option>Ingreso</option>
                        <option>Egreso</option>
                    </select>
                </div>
                <div class="col-3">
                    <input type="submit" value="BUSCAR" id="btn-buscar">
                </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-6">
                <input type="button" value="REPORTE" id="btn-rep-facturas">
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <h4>Balance:</h4>
                    </div>
                    <div class="col">
                        @php
                        $total=0;
                        $subtotalingreso=0;
                        $subtotalegreso=0;

                        foreach($facturas as $factura){
                        if($factura->ie_tipo=='Egreso'){
                        $subtotalegreso=$subtotalegreso + $factura->ie_total;
                        }elseif($factura->ie_tipo=='Ingreso'){
                        $subtotalingreso=$subtotalingreso + $factura->ie_total;
                        }
                        {{$total =$subtotalingreso-$subtotalegreso;}}
                        }
                        @endphp
                        <legend id="balance">$ {{$total}}</legend>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <a type="button" class="botones" href="{{url('/facturas/create/'.$proy_id)}}" value="NUEVO REGISTRO" id="detalles">NUEVO REGISTRO<a>
                <br>
                <a type="button" class="botones"  href="{{url('/gastospersonal/indexHP/'.$proy_id)}}" value="NUEVO REGISTRO" id="btn-historialP">HISTORIAL DE PAGOS A PERSONAL<i class="bi bi-clock-history"></i><a>   <br>
                <a type="button" id="btn-nuevoPago" href="{{url('/gastospersonal/'.$proy_id)}}" class="botones">REALIZAR NUEVO PAGO<i class="bi bi-cash-stack"></i></a>
    </div>
</div>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripción</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto total</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @php($countrow=1)
            @foreach($facturas as $factura)
            <tr>
                <th scope="row">{{$countrow++}}</th>
                <td>{{$factura->ie_descripcion}}</td>
                <td>{{$factura->ie_tipo}}</td>
                <td>{{$factura->ie_fecha}}</td>
                <td>{{$factura->ie_total}}</td>
                <td>
                    <button class="boton" id="editar" data-bs-toggle="modal" data-bs-target="#modalUpd{{$factura->_id}}">Editar</button>
                    <div class="modal fade" id="modalUpd{{$factura->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar factura</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="PUT" action="{{url('/factura/update')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="hidden" name="_id" value="{{$factura->_id}}" id="e-nombreP" placeholder="Descripción" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="proy_id" value="{{$proy_id}}" id="e-nombreP" placeholder="Descripción" class="form-control">
                                        </div>
                                        <label for="ir_descripcion">Descripción:</label>
                                        <div class="mb-3">
                                            <input type="text" name="ie_descripcion" value="{{$factura->ie_descripcion}}" id="e-nombreP" placeholder="Descripción" class="form-control" required>
                                        </div>
                                        <label for="ie_tipo">Tipo de factura:</label>
                                        <div class="mb-3">
                                            <select id="e-estadoP" name="ie_tipo">
                                                <option hidden value="{{$factura->ie_tipo}}">{{$factura->ie_tipo}}</option>
                                                <option>Egreso</option>
                                                <option>Ingreso</option>
                                            </select>
                                        </div>
                                        <label for="ie_fecha">Fecha:</label>
                                        <div class="mb-3">
                                            <input value="{{$factura->ie_fecha}}" name="ie_fecha" type="date" id="e-fechaF" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                                            <input type="submit" id="btn-e-guardarP" value="EDITAR" class="mod-guardar">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </td>
                <td><a type="button" href="{{url('/detalles/'.$factura->_id)}}" id="detalles" class=" contenidoDet">Ver contenido</a>
                </td>
                <td> 
                <button id="eliminar" class="eliminar" data-bs-toggle="modal" data-bs-target="#modal-factura{{$factura->_id}}">Eliminar</button>
                    <div class="modal fade" id="modal-factura{{$factura->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar factura</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="PUT" action="{{url('factura/destroy/'.$factura->_id)}}">
                                    @csrf
                                    <div class="modal-body">
                                        <h5>Esta factura se eliminará de manera permanente</h5>
                                        <p>¿Está seguro de eliminar esta factura?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal" class="mod-cancelar">No</button>
                                        <input type="submit" id="btn-e-guardarP" value="Si" class="mod-guardar" />
                                    </div>
                                </form>
                            </div>
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
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    #cerrar {
        position: absolute;
        bottom: 0;
    }
    .eliminar {
        background-color: crimson;
        padding: 1px;
        width: 180px;
        margin-left: 0px;
        border-radius: 3px;
        text-decoration: none;
        color: white;
        border:0px;
    }

    .contenidoDet {
        padding: 1px;
        width: 180px;
        margin-left: 2px;
        border-radius: 3px;
    }

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

    #btn-buscar {
        width: 100px;
        font: bold;
        color: white;
        background: #3b3c54;
        border: none;
    }

    #btn-rep-facturas,#btn-historialP {
        font: bold;
        background: #9cbbac;
        border: none;
        color:black;
        text-align:center;
        text-decoration:none;
    }

    #balance {
        color: green;
    }

    .botones {
        margin-bottom: 10px;
        width: 400px;
        font: bold;
        border: none;
        background: #c2d4bb;
        border-radius: 3px;
        text-align:center;
        text-decoration:none;
        color:black;
    }

    #btn-btn-nuevoPago {
        margin-bottom: 0px;        
    }

    .boton {
        width: 75px;
        font: bold;
        border: none;
    }

    #editar {
        background: #9cbbac;
    }

    #detalles {
        color: white;
        background: #fa743d;
        text-decoration: none;
        text-align: center;
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

    i {
        margin-left: 10px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
@stop