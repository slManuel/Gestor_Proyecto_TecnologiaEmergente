@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear empleados</h1>
@stop

@section('content')
<form method="POST" action="{{url('empleados')}}">
@csrf
    <div class="form-group">
        <label for="n-nombreP">Nombre:</label>                       
        <input type="text" name="emp_nombre" id="n-nombreP" placeholder="Nombre del empleado" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="n-cargoP">Cargo:</label> 
        <select name="car_id" id="n-cargoP" class="form-control">
        @foreach($cargos as $cargo)
            <option value="{{$cargo->_id}}">{{$cargo->car_nombre}}</option>
        @endforeach
        </select>
    </div>    
    <div class="form-group">
        <label for="n-estadoP">Estado:</label> 
        <select id="n-estadoP" name="emp_estado" class="form-control">
            <option value="Activo">Activo</option>
            <option Value="Inactivo">Inactivo</option>
        </select>
    </div>
    <div class="form-group">
        <label for="n-salarioP">Salario:</label> 
        <input type="number" name="emp_salario" id="n-salarioP" placeholder="Salario base mensual" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="n-telefonoP">Telefono:</label> 
        <input type="text" name="emp_tel" id="n-telefonoP" placeholder="Teléfono" class="form-control" required>
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
form{
    width: 50%;
}
    </style>
@stop

@section('js')
    
@stop