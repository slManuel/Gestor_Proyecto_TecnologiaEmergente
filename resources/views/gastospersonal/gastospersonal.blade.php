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
    <div class="row" >
        <div class="col-4">
            Filtro: 
            <select id="fp-estado">
                <option>Todos</option>
                <option>Pagados</option>
                <option>Deuda</option>
                <option>En el proyecto actual</option>
            </select>
        </div>
        <div class="col-4">
            <input type="text" id="fp-proyecto" placeholder="Nombre de empleado">
            <input type="button" id="btn_buscarpr" value="BUSCAR">
        </div>
        <div class="col-4">
            <button type="button" id="btn_crear_emp" data-bs-toggle="modal" data-bs-target="#modal-nuevoP" >CREAR NUEVO EMPLEADO</button>
            <div class="modal fade" id="modal-nuevoP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3">                          
                        <input type="text" id="n-nombreP" placeholder="Nombre del empleado" class="form-control">
                    </div>
                    <div class="mb-3">
                        <select id="n-cargoP">
                        <option>Cargo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select id="n-estadoP">
                        <option>Estado</option>
                        <option>Activo</option>
                        <option>Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" id="n-salarioP" placeholder="Salario base mensual">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="n-telefonoP" placeholder="Teléfono">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                    <button type="button" id="btn-n-guardarP" class="mod-guardar">GUARDAR</button>
                </div>
                </div>
            </div>
            </div>
            <button type="button" id="btn_crear_emp">REPORTE</button>
        </div>
    </div>
    </div>              
</div>
<div class="row">
<table class="table table-striped">
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
        <tr>
        <th scope="row">1</th>
        <td>Francisco Aguilar</td>
        <td>Sembrador</td>
        <td>150</td>
        <td>Activo</td>
        <td>7171-7788</td>
        <td>
            <button id="editar" data-bs-toggle="modal" data-bs-target="#modal-PagarP">Pagar</button>
            <div class="modal fade" id="modal-PagarP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pagar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="mb-3">
                    <input type="text" id="e-nombreP" placeholder="Nombre del empleado" class="form-control">
                    </div>
                    <div class="mb-3">
                    <input type="text" id="e-nombreP" placeholder="Comentario" class="form-control">
                    </div>
                    <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <input class="form-check-label" for="flexCheckDefault" type="number" placeholder="Pago">
                        </label>
                    </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                <button type="button" id="btn-e-guardarP" class="mod-guardar">GUARDAR</button>
                </div>
            </div>
            </div>
        </td>
        </tr>                  
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
}
#btn_nuevopr{
    width: 200px;
    height: 30px;
    font: bold;
    color: white;
    background: #3b3c54;
    border-radius: 4px;    
}
#btn_crear_emp{
    font: bold;
    color: white;
    background: #3b3c54;
    border-radius: 4px;    
}
#detalles{
    width: 80px;
    height: 30px;
    font: bold;    
    background: #9cbbac;
    border-radius: 4px;    
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