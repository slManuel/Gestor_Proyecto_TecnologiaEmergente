@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Proyecto</h1>
@stop

@section('content')
<form id="crearProyecto" method="POST" enctype="multipart/form-data" action="{{url('proyectos')}}" >
@csrf
      
    <div class="form-group">
        <label for="n-nombreP">Nombre:</label>
        <input type="text" name="proy_nombre" id="n-nombreP" placeholder="Nombre del nuevo proyecto" class="form-control" required/>
    </div>
    <div class="form-group"> 
        <label for="fp-tipocate">Estado:</label>
        <select id="fp-tipocate" name="proy_estado" class="form-control">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>                         
    </div>
    <div class="form-group">
        <label for="e-fechaP">Fecha de inicio:</label>
        <input type="date" id="e-fechaP" name="proy_fechaI" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="e-fechaP">Fecha final:</label>
        <input type="date" id="e-fechaP" name="proy_fechaF" class="form-control" required>
    </div> 
    <div class="modal-footer" id="botones">    
        <a href="{{route('proyectos.index')}}" class="mod-cancelar">CANCELAR</a>
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
    width: 50%;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop