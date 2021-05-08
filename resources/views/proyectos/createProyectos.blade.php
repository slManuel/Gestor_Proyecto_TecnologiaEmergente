@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Proyecto</h1>
@stop

@section('content')
<form id="crearCategoria" method="POST" enctype="multipart/form-data" action="{{url('proyectos')}}" >
@csrf
    <div class="modal-body">                      
        <div class="mb-3">                          
        <input type="text" name="proy_nombre" id="n-nombreP" placeholder="Nombre del nuevo proyecto" class="form-control"/>        </div>
        </div>
        <div class="mb-3"> 
            <select id="fp-tipocate" class="form-control" name="proy_estado">
                <option>Seleccione el estado</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>                         
        </div>
        <div class="mb-3">
            <input type="date" id="e-fechaP" name="proy_fechaI">
        </div>
        <div class="mb-3">
            <input type="date" id="e-fechaP" name="proy_fechaF">
        </div>                                             
    </div>
    <div class="modal-footer">    
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
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop