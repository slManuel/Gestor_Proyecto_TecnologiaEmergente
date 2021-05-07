@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ingresos y Egresos</h1>
@stop

@section('content')

<div class="row">
            <div class="col-2">
                <h3>Proyecto:</h3>
            </div>
            <div class="col-1">
                <legend id="nombre-proy">Nombre</legend>
            </div>            
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row" id="filtro-proy">
                        <div class="col-2">
                            <legend>Filtro</legend>
                        </div>
                        <div class="col-6" >                                                    
                            <select id="fp-estado">
                                <option>Tipo</option>
                                <option>Ingreso</option>
                                <option>Egreso</option>
                            </select>                    
                        </div>
                        <div class="col-3">
                            <input type="button" value="BUSCAR" id="btn-buscar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="button" value="REPORTE" id="btn-rep-facturas">
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col">
                                    <h4>Balance:</h4>
                                </div>
                                <div class="col">
                                    <legend id="balance">$$$$</legend>
                                </div>
                            </div>                                                
                        </div>
                    </div>
                </div>
                <div class="col-6">                     
                    <button id="btn-nuevoR" class="botones" data-bs-toggle="modal" data-bs-target="#modal-editarF">NUEVO REGISTRO<i class="bi bi-clipboard-plus"></i></button>
                    <div class="modal fade" id="modal-editarF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva factura</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="mb-3">
                                <input type="text" id="n-nombref" placeholder="Descripción" class="form-control">
                              </div>
                              <div class="mb-3">
                                <select id="n-estadoF">
                                  <option>Tipo</option>
                                  <option>Egreso</option>
                                  <option>Ingreso</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <input type="date" id="N-fechaF">
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
                    <br>
                    <button type="button" id="btn-historialP" class="botones">HISTORIAL DE PAGOS A PERSONAL<i class="bi bi-clock-history"></i></button>
                    <br>
                    <button type="button" id="btn-nuevoPago" class="botones">REALIZAR NUEVO PAGO<i class="bi bi-cash-stack"></i></button>
                </div>
            </div>
            <div class="row">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto total</th>
                    <th scope="col"></th>
                    <th scope="col"></th>                        
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Compra de pesticida</td>
                    <td>Egreso</td>
                    <td>20/03/2020</td>
                    <td>$8</td>                        
                    <td>
                        <button class="boton" id="editar" data-bs-toggle="modal" data-bs-target="#modal-editarF">Editar</button>
                        <div class="modal fade" id="modal-editarF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar factura</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                <div class="mb-3">
                                    <input type="text" id="e-nombreP" placeholder="Descripción" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <select id="e-estadoP">
                                    <option>Tipo</option>
                                    <option>Egreso</option>
                                    <option>Ingreso</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="date" id="e-fechaF">
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-bs-dismiss="modal" class="mod-cancelar">CANCELAR</button>
                                <button type="button" id="btn-e-guardarP" class="mod-guardar">GUARDAR</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td><input type="button" value="Detalles" id="detalles" class="boton"></td>                        
                  </tr>                  
                </tbody>
              </table>
            </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
   a{
    font-family: Arial;
    color: black;
    text-decoration: none; 
    box-shadow: 2px 2px 4px gray;   
    border-radius: 7px;    
}



i{        
    padding-right: 6px;    
}
#contenido{
    width: 79%;  
    padding: 30px;     
}
#cerrar{
    position: absolute;
    bottom: 0;
}




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
#btn-buscar{
    width: 100px;
    font: bold;
    color: white;
    background: #3b3c54;
    border: none;
}
#btn-rep-facturas{
    font:bold;    
    background: #9cbbac;
    border: none;
}
#balance{
    color: green;
}

.botones{
    margin-bottom: 10px;
    width: 400px;
    font:bold;    
    border: none;
    background: #c2d4bb;
    border-radius: 3px;
}
#btn-btn-nuevoPago{
    margin-bottom: 0px;
}

.boton{    
    width: 75px;
    font:bold;    
    border: none;    
}
#editar{    
    background: #9cbbac;
}
#detalles{    
    color: white;
    background: #fa743d;
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
i{
    margin-left: 10px;
}

    </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
@stop

@section('js')

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

@stop