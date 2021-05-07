@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')
<div class="row">
    <form>
        <div class="row">
        <div class="col-3">
            <label class="lfiltro"><input type="radio" class="radio" name="form__filtro" id="nombreCargo"
                value="cargo" />Categoría</label>
        </div>
        <div class="col-2">
            <label class="lfiltro"><input type="radio" class="radio" name="form__filtro" id="nombreProyecto"
                value="proyecto" />Proyecto</label>

        </div>
        <div class="col-3">
        
            <select id="fp-tipocate" class="form-control">
            <option>Seleccione el tipo de categoría</option>
            <option>Ingreso</option>
            <option>Egreso</option>
            </select>
        </div>
        </div>
<br>
        <div class="row bus" id="div2">

        <input type="search" placeholder="Escriba lo que desea buscar" name="contenido__busquedaUnidadesMedida"
            id="bus_unidad">
        <a href="{{route('categorias.create')}}" id="btn_nuevoCargo">NUEVA CATEGORIA</a>
        <button type="button" id="btn_Reporte">NUEVO REPORTE</button>

        </div>


        <!--<div class="modal fade" id="modal-nuevoP" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="mb-3">
                    <input type="text" id="n-nombreP" placeholder="Nombre de la nueva categoría" class="form-control">
                </div>

                <div class="mb-3">

                    <select id="fp-tipocate" class="form-control">
                    <option> Tipo de categoría</option>
                    <option>Ingreso</option>
                    <option>Egreso</option>
                    </select>
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

    </form>
    </div>
    <div class="row">
    <div class="row">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Categoría</th>
            <th scope="col">Tipo</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @php($countrow=1)
        @foreach($categorias as $categoria)
            <tr>
            <th scope="row">{{$countrow++}}</th>
            <td>{{$categoria->cat_nombre}}</td>
            <td>{{$categoria->cat_tipo}}</td>
            <td>
                <button id="editar" data-bs-toggle="modal" data-bs-target="#modal-editarP{{$categoria->_id}}">Editar</button>
                <div class="modal fade" id="modal-editarP{{$categoria->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="PUT" action="{{url('/categorias/update/'.$categoria->_id)}}" >
                        @csrf    
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="text" id="n-nombreP" name="cat_nombre" placeholder="Nombre de categoría" class="form-control" value="{{$categoria->cat_nombre}}">
                            </div>
                            <div class="mb-3">
                                <select id="fp-tipocate" class="form-control" name="cat_tipo" >
                                <option hidden value="{{$categoria->cat_tipo}}">{{$categoria->cat_tipo}}</option>
                                <option value="Ingreso">Ingreso</option>
                                <option value="Egreso">Egreso</option>
                                </select>
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

  input.radio{
      width: 10px;
      margin-right: 3px;
      margin-left: 0px;
    
  }

  
#bus_unidad{
    width: 60%;
    height: 30px;
}
input#bus_unidad{
    width: 45%;
}
select{
    width: 250px;
    height: 30px;
    border: lightgray 1px solid;
    border-radius: 4px;    
}
#div2{
    margin-top: -40px;
    padding-top: 50px;
}
#btn_nuevoCargo{
    width: 190px;
    height: 30px;
    font: bold;
    color: white;
    background: #3b3c54;
    border-radius: 4px;    
    margin-left: 3PX;
    margin-right: 3PX;
    text-align: center;
    text-decoration: none;
}
#btn_Reporte{
    width: 180px;
    height: 30px;
    font: bold;
    color: white;
    background: #3b3c54;
    border-radius: 4px;    
    margin-left: 3PX;
    margin-right: 3PX;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
@stop