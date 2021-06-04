@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Categorías</h1>
@stop

@section('content')
<div class="row">
    <form action="{{route('categorias.index')}}">
        <div class="row">
            <div class="col-4">
                Estado:
                <select id="fp-tipocate" name="estadoBusqueda">
                    <option>Todos</option>
                    <option>Ingreso</option>
                    <option>Egreso</option>
                </select>
            </div>
            <div class="col-4">
                <input type="text" id="fp-proyecto" id="bus_unidad" name="contenido__busquedaUnidadesMedida" placeholder="Categoría">
                <input type="submit" id="btn_buscarpr" value="BUSCAR">
            </div>
            <a href="{{route('categorias.create')}}" id="btn_nuevoCargo">NUEVA CATEGORIA</a>
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
                        <div class="modal fade" id="modal-editarP{{$categoria->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar categoría</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="PUT" action="{{url('/categorias/update/'.$categoria->_id)}}">
                                        @csrf
                                        <div class="modal-body">
                                            <label for="cat_nombre">Categoría:</label>
                                            <div class="mb-3">
                                                <input type="text" id="n-nombreP" name="cat_nombre" placeholder="Nombre de categoría" class="form-control" value="{{$categoria->cat_nombre}}" required>
                                            </div>
                                            <label for="cat_tipo">Tipo de categoría:</label>
                                            <div class="mb-3">
                                                <select id="fp-tipocate" class="form-control" name="cat_tipo">
                                                    <option hidden value="{{$categoria->cat_tipo}}">{{$categoria->cat_tipo}}</option>
                                                    <option value="Ingreso">Ingreso</option>
                                                    <option value="Egreso">Egreso</option>
                                                </select>
                                            </div>
                                            <label hidden for="cat">Categoría:</label>
                                            <div class="mb-3">
                                                <input hidden type="text" id="n-nombreP" name="cat" placeholder="Nombre de categoría" class="form-control" value="{{$categoria->cat_nombre}}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                                            <input type="submit" id="btn-e-guardarP" value="GUARDAR" class="mod-guardar" />
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
    form {
        padding: 1em;
    }

    input.radio {
        width: 10px;
        margin-right: 3px;
        margin-left: 0px;

    }


    #bus_unidad {
        width: 40%;
        height: 30px;
    }

    input#bus_unidad {
        width: 30%;
    }

    select {
        width: 250px;
        height: 30px;
        border: lightgray 1px solid;
        border-radius: 4px;
    }

    #div2 {
        margin-top: -40px;
        padding-top: 50px;
    }

    #btn_buscarpr {
        width: 75px;
        height: 30px;
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 4px;
        text-decoration: none;
    }

    #btn_nuevoCargo {
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

    #btn_Reporte {
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

    #detalles {
        width: 80px;
        height: 30px;
        font: bold;
        background: #9cbbac;
        border-radius: 4px;
        border: none;
    }

    #editar,
    #pagos {
        width: 80px;
        height: 30px;
        font: bold;
        background: #c2d4bb;
        border-radius: 4px;
        border: none;
    }

    #eliminar {
        width: 80px;
        height: 30px;
        font: bold;
        color: white;
        background: #fa743d;
        border-radius: 4px;
        border: none;
    }

    .mod-cancelar {
        width: 100px;
        height: 30px;
        font: bold;
        background: #c2d4bb;
        border-radius: 3px;
        border: none;
    }

    .mod-guardar {
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