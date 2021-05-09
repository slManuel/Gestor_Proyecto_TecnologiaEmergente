@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear empleados</h1>
@stop

@section('content')
<form method="POST" action="{{url('empleados')}}">
@csrf
    <div class="mb-3">                          
        <input type="text" name="emp_nombre" id="n-nombreP" placeholder="Nombre del empleado" class="inp">
    </div>
    <div class="mb-3">
        <select name="car_id" id="n-cargoP" class="inp">
        @foreach($cargos as $cargo)
            <option value="{{$cargo->_id}}">{{$cargo->car_nombre}}</option>
        @endforeach
        </select>
    </div>    
    <div class="mb-3">
        <select id="n-estadoP" name="emp_estado" class="inp">
            <option value="Activo">Activo</option>
            <option Value="Inactivo">Inactivo</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="number" name="emp_salario" id="n-salarioP" placeholder="Salario base mensual" class="inp">
    </div>
    <div class="mb-3">
        <input type="text" name="emp_tel" id="n-telefonoP" placeholder="Teléfono" class="inp">
    </div>
    <div class="modal-footer">    
        <a href="{{route('empleados.index')}}" class="mod-cancelar">CANCELAR</a>
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