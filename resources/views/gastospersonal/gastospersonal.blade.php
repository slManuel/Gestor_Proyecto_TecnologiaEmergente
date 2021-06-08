@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Gasto personal</h1>
@stop

@section('content')
<div class="row">
    <div class="col" id="filtro-proy">
        <div class="row">
            <legend>Filtros</legend>
        </div>
        <div class="row">
            <div class="col-sm">
                <select id="fp-estado">
                    <option>Todos</option>
                    <option>Pagados</option>
                    <option>Deuda</option>
                    <option>En el proyecto actual</option>
                </select>
            </div>
            <div class="col-sm">
                <input type="text" id="fp-proyecto" placeholder="Nombre de empleado">
            </div>
            <div class="col-sm">
                <input type="button" id="btn_buscarpr" value="BUSCAR">
            </div>
            <div class="col-sm">
                <a href="{{route('empleados.create')}}" id="btn_crear_emp">CREAR NUEVO EMPLEADO</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <?php
    echo '<input type="hidden" value="' . htmlspecialchars($proy) . '" />' . "\n";
    ?>
    <table class="table-responsive-md table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cargo</th>
                <th scope="col">Salario</th>
                <th scope="col">Estado</th>
                <th scope="col">Teléfono</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @php($countrow=1)
            @foreach($empleados as $empleado)
            <tr>
                <th scope="row">{{$countrow++}}</th>
                <td>{{$empleado->emp_nombre}}</td>
                <td>{{$empleado->cargo->car_nombre}}</td>
                <td>{{$empleado->emp_salario}}</td>
                <td>{{$empleado->emp_estado}}</td>
                <td>{{$empleado->emp_tel}}</td>
                <td>
                    <a href="{{url('/gastospersonal/'.$empleado->_id,$proy)}}" id="pagos">Pagar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<style>
    #filtro-proy {
        border: lightgray 1px solid;
        border-radius: 2px;
        margin-top: 10px;
        padding: 10px;
        margin-bottom: 10px;
    }

    select,
    input {
        width: 200px;
        height: 30px;
        border: lightgray 1px solid;
        border-radius: 4px;
    }

    #fp-proyecto {
        border-radius: 3px;
        border: 0.3px solid lightgray;
    }

    #btn_buscarpr {
        width: 75px;
        height: 30px;
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 4px;
    }

    #btn_nuevopr {
        width: 200px;
        height: 30px;
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 4px;
    }

    #btn_crear_emp {
        font: bold;
        color: white;
        background: #3b3c54;
        border-radius: 4px;
        padding: 5px;
        text-decoration: none;
        text-align: center;
    }

    #detalles {
        width: 80px;
        height: 30px;
        font: bold;
        background: #9cbbac;
        border-radius: 4px;
    }

    #editar,
    #pagos {
        font: bold;
        background: #c2d4bb;
        border-radius: 4px;
        border: none;
        color: black;
        text-align: center;
        text-decoration: none;
        padding: 4px;
    }

    #eliminar {
        width: 80px;
        height: 30px;
        font: bold;
        color: white;
        background: #fa743d;
        border-radius: 4px;
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