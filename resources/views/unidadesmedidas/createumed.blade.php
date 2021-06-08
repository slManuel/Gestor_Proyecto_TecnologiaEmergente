@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Nueva Unidad de Medida</h1>
@stop

@section('content')

<form method="POST" enctype="multipart/form-data" action="{{route('UnidadesMedidas.store')}}">
    @csrf
    <div class="form-group">
        <label for="um_nom">Nombre:</label>
        <input id="um_nom" type="text" name="um_nombre" placeholder="Nombre de la nueva unidad de medida" class="form-control" required>
    </div>
    <div class="modal-footer" id="botones">    
    <a href="{{route('UnidadesMedidas.index')}}" class="mod-cancelar">CANCELAR</a>
        <input type="submit" id="btnGuardar" class="mod-guardar" value="GUARDAR" />                        
    </div>
</form>
@stop

@section('css')
<style>
    .mod-cancelar {
        width: 100px;
        height: 30px;
        font: bold;
        background: #c2d4bb;
        border-radius: 3px;
        border: none;
        color:black;
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
    form {
        width: 75%;
    }
</style>

@stop

@section('js')
@stop