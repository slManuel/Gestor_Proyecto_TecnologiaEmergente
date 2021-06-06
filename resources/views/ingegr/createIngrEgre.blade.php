@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>NUEVA FACTURA</h1>
@stop

@section('content')
<div class="modal-body">
    <form method="POST" action="{{url('/factura/store/'.$id)}}">
        @csrf
        <div class="col-6">
            <label for="n-nombref">Descripción:</label>
            <br>
            <input type="text" id="n-nombref" name="ie_descripcion" placeholder="Descripción" class="form-control" required>
        </div>
        <div class="col-7">
            <label for="n-estadoF">Tipo:</label>
            <br>
            <select id="n-estadoF" name="ie_tipo">                
                <option>Egreso</option>
                <option>Ingreso</option>
            </select>
        </div>
        <div class="col-6">
            <label for="N-fechaF">Fecha:</label>
            <br>
            <input type="date" name="ie_fecha" id="N-fechaF"required>
        </div>
        <div class="modal-footer">            
            <a href="{{url('facturas/'.$id)}}" class="mod-cancelar">CANCELAR</a>
            <input type="submit" id="btn-n-guardarP" value="GUARDAR" class="mod-guardar" />
        </div>
    </form>
</div>

@stop

@section('css')
<style>
    form{
        width: 50%;
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

    #btn-rep-facturas {
        font: bold;
        background: #9cbbac;
        border: none;
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
    }

    .mod-cancelar {
        width: 100px;
        height: 30px;
        font: bold;
        background: #c2d4bb;
        border-radius: 3px;
        border: none;
        color: black;
        text-align: center;
        text-decoration: none;
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

<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

@stop