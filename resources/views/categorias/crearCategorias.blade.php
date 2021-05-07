@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Categoria</h1>
@stop

@section('content')
<form id="crearCategoria" method="POST" action="{{url('categorias')}}">
@csrf
    <div class="modal-body">                      
        <div class="mb-3">                          
        <input type="text" name="cat_nombre" id="n-nombreP" placeholder="Nombre de la nueva categoria" class="form-control"/>
        </div>
        <div class="mb-3"> 
            <select id="fp-tipocate" class="form-control" name="cat_tipo">
                <option>Seleccione el tipo de categoría</option>
                <option value="Ingreso">Ingreso</option>
                <option value="Egreso">Egreso</option>
            </select>                         
        </div>                                             
    </div>
    <div class="modal-footer">    
    <a href="{{route('categorias.index')}}" class="mod-cancelar">CANCELAR</a>
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