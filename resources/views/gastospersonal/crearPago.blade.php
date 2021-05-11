@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pagar a empleado</h1>
@stop

@section('content')

<form method="POST" action="{{url('gastospersonal')}}" >
@csrf
    <input type="hidden" value="{{$proyecto}}" name="proyecto">
    <input type="hidden" value="{{$empleado}}" name="empleado">
    <div class="mb-3">
        <input type="date" id="e-fechaP" name="gp_fecha" class="inp">
    </div>
    <div class="mb-3">
        <input type="text" name="gp_comentario" placeholder="Comentario" class="form-control">
    </div>
    <div class="mb-3">                    
        <input name="gp_pago" class="form-check-label inp" for="flexCheckDefault" type="number" placeholder="Pago">                        
    </div>
    <a href="{{url('/gastospersonal/'.$proyecto)}}" class="mod-cancelar">CANCELAR</a>
    <input type="submit" id="C_guardar" class="mod-guardar" value="GUARDAR"/>
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
    text-align:center;
    text-decoration:none;
    padding:4px;
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
.inp{
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