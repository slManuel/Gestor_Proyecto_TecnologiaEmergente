@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Cargo</h1>
@stop

@section('content')
<form id="crearCargo" method="POST" action="{{url('cargos')}}">
@csrf
    <div class="modal-body">       
    <label for="car_nombre">Nombre del cargo:</label>               
        <div class="mb-3">                          
        <input type="text" name="car_nombre" id="n-nombreP" placeholder="Nombre del nuevo cargo" class="form-control" required/>
        </div>                                             
    </div>
    <div class="modal-footer">    
    <a href="{{route('cargos.index')}}" class="mod-cancelar">CANCELAR</a>
    <input type="submit" name="C_guardar" id="C_guardar" class="mod-guardar" value="GUARDAR"/>                        
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
input.radio{
    width: 10px;
    margin-right: 3px;
    margin-left: 0px;
  
}
form{
    width:50%;
}
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


