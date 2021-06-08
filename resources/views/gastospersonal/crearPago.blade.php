@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Pagar a empleado</h1>
@stop

@section('content')

<form method="POST" enctype="multipart/form-data" action="{{url('gastospersonal')}} " >
    @csrf
    <input type="hidden" value="{{$proyecto}}" name="proyecto">
    <input type="hidden" value="{{$empleado}}" name="empleado">
    <div class="form-group">
        <label for="e-fechaP">Fecha de pago:</label>
        <input type="date" id="e-fechaP" name="gp_fecha" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="com">Comentario:</label>
        <input id="com" type="text" name="gp_comentario" placeholder="Comentario" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="pago">Pago:</label>
        <br>
        <input id="pago" min="0" step="0.01" type="number" name="gp_pago" class="form-control" placeholder="Pago" required>
    </div>
    <div class="modal-footer" id="botones">    
        <a href="{{url('/gastospersonal/'.$proyecto)}}" class="mod-cancelar">CANCELAR</a>
        <input type="submit" id="C_guardar" class="mod-guardar" value="GUARDAR" />                        
    </div>
</form>
@stop

@section('css')
<style>
    form {
        width: 75%;
    }

    .mod-cancelar {
        width: 100px;
        height: 30px;
        font: bold;
        text-align: center;
        background: #c2d4bb;
        border-radius: 3px;
        border: none;
        color: black;
        text-align: center;
        text-decoration: none;
        padding: 4px;
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

    .inp {
        width: 300px;
        margin-right: 3px;
        margin-left: 0px;
        border-radius: 3PX;
        border-radius: 3PX;
        border: 0.2px solid lightgray;
    }
</style>
@stop

@section('js')

@stop