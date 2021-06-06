@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Lista de usuarios con acceso al sistema</h1>
@stop

@section('content')
<div class="row">
  <div class="col" id="filtro-proy">
    <div class="row">
      <legend>Filtros</legend>
    </div>
    <form>
      <div class="row">
        <div class="col-4">
          <input class="inp" name="nombre" type="text" placeholder="Nombre del empleado">
        </div>
        <div class="col-4">
          <input class="inp" name="correo" type="text" placeholder="Correo electrónico">
        </div>
        <div class="col-3">
          <input type="submit" id="btn_buscarpr" value="BUSCAR">
        </div>
      </div>
    </form>
    <br>
    <div class="row">
      <a href="{{route('personal.create')}}" id="btn_crear_emp">CREAR NUEVO USUARIO</a>
    </div>
  </div>
</div>

<div class="row">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Cargo</th>
        <th scope="col">Estado</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @php($countrow=1)
      @foreach($usuarios as $usr)
      <tr>
        <th scope="row">{{$countrow++}}</th>
        <td>{{$usr->name}}</td>
        <td>{{$usr->email}}</td>
        <td>{{$usr->rol}}</td>
        <td>{{$usr->estado}}</td>
        <td>
          <button id="editar" data-bs-toggle="modal" data-bs-target="#modalU{{$usr->_id}}">Editar</button>
          <div class="modal fade" id="modalU{{$usr->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="PUT" action="{{url('/personal/update/'.$usr->_id)}}">
                  @CSRF
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="n-nombreP">Nombre:</label>
                      <input type="text" name="name" value="{{$usr->name}}" id="n-nombreP" placeholder="Nombre del usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="n-correo">Correo:</label>
                      <input type="text" name="email" value="{{$usr->email}}" id="n-correo" placeholder="Correo del usuario" class="form-control" pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}" title="El correo debe de cumplir con el patron ejemplo@mail.com" required>
                    </div>
                    <label for="n-estado">Cargo:</label>
                    <select id="n-estado" name="rol" class="form-control">
                      <option hidden value="{{$usr->rol}}">{{$usr->rol}}</option>
                      <option value="Administrador">Administrador</option>
                      <option Value="Usuario">Usuario</option>
                    </select>
                    <label for="n-estado">Estado:</label>
                    <select id="n-estado" name="estado" class="form-control">
                      <option hidden value="{{$usr->estado}}">{{$usr->estado}}</option>
                      <option value="Activo">Activo</option>
                      <option Value="Inactivo">Inactivo</option>
                    </select>
                    <input type="text" name="original" value="{{$usr->email}}" hidden>
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                    <input type="submit" id="btn-e-guardarP" value="EDITAR" class="mod-guardar" />
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

  select {
    width: 390px;
    height: 30px;
    border: lightgray 1px solid;
    border-radius: 4px;
  }

  #btn_buscarpr {
    width: 75px;
    height: 30px;
    font: bold;
    color: white;
    background: #3b3c54;
    border-radius: 4px;
  }

  #botones {
    position: relative;
    left: 100px;
  }

  #btn_rep {
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
    text-align: center;
    text-decoration: none;
    width: 200px;
    margin-left: 10px;
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

  .inp {
    width: 300px;
    margin-right: 3px;
    margin-left: 0px;
    border-radius: 3PX;
    border: 0.2px solid lightgray;
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
@stop