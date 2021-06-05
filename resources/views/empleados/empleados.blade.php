@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de empleados</h1>
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
                      <select class="inp" name="cargo">
                        <option>Todos</option>
                        @foreach($cargos as $car)
                            <option value="{{$car->_id}}">{{$car->car_nombre}}</option>
                        @endforeach                    
                      </select>
                    </div>
                    <div class="col-4">
                      <input class="inp" name="nombre" type="text" placeholder="Nombre del empleado">
                    </div>
                    <div class="col-3">
                      <input type="submit" id="btn_buscarpr" value="BUSCAR">
                    </div>
                  </div>
                </form>         
                <br>       
                <div class="row" >                    
                    <div class="col-6" id="botones">                    
                      <a href="{{route('empleados.create')}}" id="btn_crear_emp">CREAR NUEVO EMPLEADO</a>
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
                    <th scope="col">Estado</th>
                    <th scope="col">Pago</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col"></th>
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
                    <td>{{$empleado->emp_estado}}</td>
                    <td>{{$empleado->emp_salario}}</td>
                    <td>{{$empleado->emp_tel}}</td>
                    <td>
                      <button id="editar" data-bs-toggle="modal" data-bs-target="#modal-editarEmp{{$empleado->_id}}">Editar</button>
                      <div class="modal fade" id="modal-editarEmp{{$empleado->_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Editar empleado</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>                            
                            <form method="PUT" action="{{url('/empleados/update/'.$empleado->_id)}}">                              
                              @csrf                              
                              <div class="modal-body">
                                <div class="form-group"> 
                                  <label for="e-nombreP">Nombre:</label>                             
                                  <input type="text" name="emp_nombre" placeholder="Nombre del empleado" value="{{$empleado->emp_nombre}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label for="n-cargoP">Cargo:</label>
                                  <select name="car_id" id="n-cargoP" class="form-control">
                                    <option hidden value="{{$empleado->car_id}}" selected>{{$empleado->cargo->car_nombre}}</option>
                                  @foreach($cargos as $cargo)                                  
                                    <option value="{{$cargo->_id}}">{{$cargo->car_nombre}}</option>
                                  @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="n-estadoP">Estado:</label>
                                  <select id="n-estadoP" name="emp_estado" class="form-control">
                                    <option hidden value="{{$empleado->emp_estado}}">{{$empleado->emp_estado}}</option>
                                    <option value="Activo">Activo</option>
                                    <option Value="Inactivo">Inactivo</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="n-salarioP">Salario:</label>
                                  <input type="number" name="emp_salario" id="n-salarioP" placeholder="Salario base mensual" value="{{$empleado->emp_salario}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label for="n-telefonoP">Teléfono:</label>
                                  <input type="text" name="emp_tel" id="n-telefonoP" placeholder="Teléfono" value="{{$empleado->emp_tel}}" class="form-control" required>
                                </div>
                              </div>                              
                              <div class="modal-footer">    
                                <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                                <input type="submit" id="btn-e-guardarP" value="EDITAR" class="mod-guardar"/>
                              </div>                              
                            </form>                                                        
                          </div>
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
#filtro-proy{
    border: lightgray 1px solid;
    border-radius: 2px;
    margin-top: 10px;
    padding: 10px;
    margin-bottom: 10px;
}
#radio2{
    position: relative;
    left: -55px;   
}
#radio3{
    position: relative;
    left: -50px;   
}
select{
    width: 390px;
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
#botones{
    position: relative;
    left: 100px;
}
#btn_rep{
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
    padding:5px;
    text-align:center;
    text-decoration:none;
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
.inp{
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