@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Factura</h1>
@stop

@section('content')
<form id="crearProyecto" method="POST" enctype="multipart/form-data" action="{{url('/factura/store/'.$id)}}">
    @csrf
    <div class="form-group">
        <label for="n-nombref">Descripción:</label>
        <input type="text" id="n-nombref" name="ie_descripcion" placeholder="Descripción" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="n-estadoF">Tipo:</label>
        <select id="n-estadoF" name="ie_tipo" class="form-control">                
            <option>Egreso</option>
            <option>Ingreso</option>
        </select>
    </div>
    <div class="form-group">
        <label for="N-fechaF">Fecha:</label>
        <input type="date" name="ie_fecha" id="N-fechaF" class="form-control" required>
    </div>
    <div class="modal-footer">            
        <a href="{{url('facturas/'.$id)}}" class="mod-cancelar">CANCELAR</a>
        <input type="submit" id="btn-n-guardarP" value="GUARDAR" class="mod-guardar" />
    </div>
</form>

@stop

@section('css')
<style>
    .mod-cancelar{
    width: 100px;
    height: 30px;
    font: bold;
    text-align:center;
    background: #c2d4bb;
    border-radius: 3px;  
    border: none;
    color:black;
    text-decoration: none;
    }
    .mod-guardar{
        width: 100px;
        height: 30px;
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 3px;  
        border: none;    
    }
    form{
        width: 75%;
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