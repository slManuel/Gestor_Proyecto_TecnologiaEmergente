@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Nuevo usuario del sistema</h1>
@stop

@section('content')

<form method="POST" action="{{route('personal.store')}}">
    @csrf
    <div class="mb-3">
        <div class="mb-3">
            <label for="n-nombreP">Nombre:</label>
            <input type="text" name="name" id="n-nombreP" placeholder="Nombre del usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="n-correo">Correo:</label>
            <input type="text" name="email" id="n-correo" placeholder="Correo del usuario" class="form-control" pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}" title="El correo debe de cumplir con el patron ejemplo@mail.com" required>
        </div>
        <div class="mb-3">
            <label for="n-contra">Contraseña:</label>
            <input type="password" name="password" id="n-contra" placeholder="Escriba una contraseña" class="form-control" pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,15}" title="La contraseña debe tener entre 8 y 16 caracteres, al menos un número, al menos una minúscula y al menos una mayúscula. NO puede tener otros símbolos" required>
        </div>
        <div class="mb-3">
            <label for="n-cof">Confirme contraseña:</label>
            <input type="password" name="confirmar" id="n-conf" placeholder="Vuelva a escribir su contraseña" class="form-control" pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,15}" title="La contraseña debe tener entre 8 y 16 caracteres, al menos un número, al menos una minúscula y al menos una mayúscula. NO puede tener otros símbolos" required>
        </div>
        <label for="n-estado">Cargo:</label>
        <select id="n-estado" name="rol" class="form-control">
            <option value="Administrador">Administrador</option>
            <option Value="Usuario">Usuario</option>
        </select>
        <label for="n-estado">Estado:</label>
        <select id="n-estado" name="estado" class="form-control">
            <option value="Activo">Activo</option>
            <option Value="Inactivo">Inactivo</option>
        </select>
    </div>
    <div class="mb-3">
        <a href="{{route('personal.index')}}" class="mod-cancelar">CANCELAR</a>
        <input type="submit" id="btnGuardar" class="mod-guardar" value="GUARDAR" />
    </div>
</form>
@stop

@section('css')
<style>
    .mod-cancelar {
        width: 100px;
        height: 30px;
        font: bold;
        background: #c2d4bb;
        border-radius: 3px;
        border: none;
        color: black;
        text-align: center;
        text-decoration: none;
        padding: 4px;
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

    form {
        width: 50%;
    }
</style>

@stop

@section('js')
@stop