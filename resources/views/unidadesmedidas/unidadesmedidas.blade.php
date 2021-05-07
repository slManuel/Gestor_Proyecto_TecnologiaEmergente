@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Unidades de medidas</h1>
@stop

@section('content')
<div class="row">
          <form >
                <input type="search" placeholder="Escriba el nombre que desea buscar" name="contenido__busquedaUnidadesMedida" id="bus_unidad">
              <a  href="{{url('/unidades/create')}}" style="text-decoration: none;"  id="btn_nuevoUM" >NUEVA UNIDAD DE MEDIDA</a>
                               
          </form>     
        </div>
        <div class="row">
          <div class="row">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Unidad de medida</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                @php($countrow=1)
                @foreach($unidadesmeds as $unidad)
                  <tr>
                    <th scope="row">{{$countrow++}}</th>
                    <td>{{$unidad->um_nombre}}</td>
                                       <td>
                    <button id="editar" data-bs-toggle="modal" data-bs-target="#modalU{{$unidad->_id}}">Editar</button>
                    <div class="modal fade" id="modalU{{$unidad->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar unidad de medida</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="PUT" action="{{url('/unidades/update/'.$unidad->_id)}}">
                             @CSRF
                            <div class="mb-3">                          
                                <input type="text" name="um_nombre" value="{{$unidad->um_nombre}}" id="n-nombreP" placeholder="Nombre de la unidad de medida" class="form-control">
                              </div>
                              </div>
                          <div class="modal-footer">
                            <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                            <input type="submit" id="btn-e-guardarP" value="EDITAR" class="mod-guardar"/>
                          </div>
                            </form>
                         
                        </div>
                      </div>
                    </td>
                   
                  </tr>   
                  @endforeach                  
                </tbody>
              </table>
          </div>
        </div>
@stop

@section('css')
<style>
      form{
    padding: 1em;
}

#bus_unidad{
    width: 60%;
    height: 30px;
}

#btn_nuevoUM{
    width: 300px;
    height: 30px;
    font: bold;
    color: white;
    background: #3b3c54;
    border-radius: 4px;    
}

/*Modal----------*/

#detalles{
    width: 80px;
    height: 30px;
    font: bold;    
    background: #9cbbac;
    border-radius: 4px;
    border: none;
}
#editar, #pagos{
    width: 80px;
    height: 30px;
    font: bold;    
    background: #c2d4bb;
    border-radius: 4px;    
    border: none;
}
#eliminar{
    width: 80px;
    height: 30px;
    font: bold;
    color: white;
    background: #fa743d;
    border-radius: 4px;   
    border: none; 
}


a{
  text-decoration: none;
  padding: 5px;
}
</style>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

@stop
