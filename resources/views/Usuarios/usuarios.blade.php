@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de usuarios</h1>
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
                      <button type="button" id="btn_rep">REPORTE</button>
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
                    <th scope="col">Correo</th>
                    <th scope="col">Cargo</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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