@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Nueva Unidad de Medida</h1>
@stop

@section('content')

                <form method="POST" action="{{route('UnidadesMedidas.store')}}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="um_nombre" placeholder="Nombre de la nueva unidad de medida" class="form-control">
                    </div>
                    <div "mb-3">
                        <button type="button" class="mod-cancelar">CANCELAR</button>
                        <input type="submit" id="btnGuardar" class="mod-guardar" value="GUARDAR"  />
                    </div>
                </form>       
@stop

@section('css')
<style>
    .mod-cancelar{
    width: 100px;
    height: 30px;
    font: bold;
    background: #c2d4bb;
    border-radius: 3px;  
    border: none;
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
</style>
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop


