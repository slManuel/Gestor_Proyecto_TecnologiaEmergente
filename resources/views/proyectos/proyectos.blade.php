@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de Proyectos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col" id="filtro-proy">
            <div class="row">
                <legend>Filtros</legend>
            </div>
            <form action="{{url('/proyectos')}}">
                <div class="row" >
                    <div class="col-4">
                        Estado: 
                        <select id="fp-estado" name="estadoBusqueda">
                            <option>Todos</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" id="fp-proyecto" name="nombreBusqueda" placeholder="Proyecto">
                        <input type="submit" id="btn_buscarpr" value="BUSCAR">
                    </div>
                    <div>
                </div>
            </form>
        
    </div>              
    </div>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3">                
        <a href="{{route('proyectos.create')}}" id="btn_nuevoCargo">NUEVO PROYECTO</a>
        
        <!--<div class="modal fade" id="modal-nuevoP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="mb-3">                          
                    <input type="text" id="n-nombreP" placeholder="Nombre del proyecto" class="form-control">
                    </div>
                    <div class="mb-3">
                    <select id="n-estadoP">
                        <option>Estado</option>
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <input type="date" id="n-fechaP">
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                <button type="button" id="btn-n-guardarP" class="mod-guardar">GUARDAR</button>
                </div>
            </div>
            </div-->
            
        </div>
        </div>
    </div>
    <br/>
    <div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Proyecto</th>
            <th scope="col">Fecha inicio</th>
            <th scope="col">Fecha final</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @php($countrow=1)
        @foreach($proyectos as $proyecto)
       
            <tr>
            <th scope="row">{{$countrow++}}</th>
            <td>{{$proyecto->proy_nombre}}</td>
            <td>{{$proyecto->proy_fechaI}}</td>
            <td>{{$proyecto->proy_fechaF}}</td>
            <td>{{$proyecto->proy_estado}}</td>
            <td>  <a type="button" href="{{url('/facturas/'.$proyecto->_id)}}" value="Detalles" id="detalles">Detalles<a>
            </td>
            <td>
            <button id="editar" data-bs-toggle="modal" data-bs-target="#modal-editarP{{$proyecto->_id}}">Editar</button>
            <div class="modal fade" id="modal-editarP{{$proyecto->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="PUT" action="{{url('/proyectos/update/'.$proyecto->_id)}}">
                    @csrf  
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="e-nombreP">Nombre:</label>
                                <input type="text" id="e-nombreP" name="proy_nombre" value="{{$proyecto->proy_nombre}}" placeholder="Nombre del proyecto" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="e-estadoP">Estado:</label>
                                <select id="e-estadoP" class="form-control" name="proy_estado" >
                                    <option hidden value="{{$proyecto->proy_estado}}">{{$proyecto->proy_estado}}</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="e-fechaP">Fecha de inicio:</label>
                                <input type="date" id="e-fechaP" name="proy_fechaI" value="{{$proyecto->proy_fechaI}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="e-fechaP">Fecha final:</label>
                                <input type="date" id="e-fechaP" name="proy_fechaF" value="{{$proyecto->proy_fechaF}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                        <input type="submit" id="btn-e-guardarP" value="GUARDAR" class="mod-guardar"/>
                    </div>
                </form>
                </div>
                </div>
            </td>            
            <td><a type="button" href="{{url('/gastospersonal/'.$proyecto->_id)}}" id="pagos">Pagos</a></td>
            </tr>  
            @endforeach                 
        </tbody>
        </table>
    </div>
@stop

@section('css')
<style>
  
#filtro-proy{
    border: lightgray 1px solid;
    border-radius: 2px;
    margin-top: 10px;
    padding: 10px;
    margin-bottom: 10px;
    
}
select, input{
    width: 200px;
    height: 30px;
    border: lightgray 1px solid;
    border-radius: 4px;  
     
}
#btn_buscarpr{
    width: 75px;
    height: 30px;
    font: bold;
    color: white;
    background: #3b3c54;
    border-radius: 4px;  
    text-decoration: none;   
}
#btn_nuevoCargo{
    position: relative;
    width: 250px;
    height: 90px;
    font: bold;
    color: white;
    background: #3b3c54;
    border-radius: 4px;  
    border-radius: 4px;    
    margin-left: 3PX;
    margin-right: 3PX;
    text-align: center;
    text-decoration: none;
    padding: 5px;
    
}
#detalles{
    width: 80px;
    height: 30px;
    font: bold;    
    background: #9cbbac;
    border-radius: 4px;    
    padding: 5px;
    text-align: center;
    text-decoration: none;
    color: black;
}
#editar, #pagos{
    width: 80px;
    height: 30px;
    font: bold;    
    background: #c2d4bb;
    border-radius: 4px;    
    border: none;
    color:black;
    text-decoration:none;
    text-align:center;
    text-decoration: none;
}
#eliminar{
    width: 80px;
    height: 30px;
    font: bold;
    color: white;
    background: #fa743d;
    border-radius: 4px;
    text-decoration: none;    
}

.mod-cancelar{
    width: 100px;
    height: 30px;
    font: bold;
    background: #c2d4bb;
    border-radius: 3px;  
    border: none;
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
    text-decoration: none;
}


</style>


 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
@stop

@section('js')

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

@stop