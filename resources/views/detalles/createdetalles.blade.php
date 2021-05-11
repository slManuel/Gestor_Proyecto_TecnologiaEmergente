@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>NUEVO DETALLE DE FACTURA</h1>
@stop

@section('content')
                        <div class="modal-body">
                            <form method="POST" action="{{url('/detalles/store')}}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" hidden name="ie_id" value="{{$idfactura}}" id="n-des" >
                            </div>
                            <label for="det_descripcion">Descripción:</label>
                            <div class="mb-3">
                                <input type="text" name="det_descripcion" id="n-des" placeholder="Descripción" class="form-control" required>
                            </div>
                            <label for="cat_id">Categoría:</label>
                            <div class="mb-3" >
                                <select name="cat_id" id="n-cate" class="form-control">
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->_id}}">{{$categoria->cat_nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label for="um_id">Unidad de medida:</label>
                            <div class="mb-3" >
                                <select name="um_id" id="n-umedida" class="form-control">
                                @foreach($unidades as $unidad)
                                <option value="{{$unidad->_id}}">{{$unidad->um_nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                           <label for="det_cantidad">Cantidad:</label>
                            <div class="mb-3">
                                <input name="det_cantidad" type="number" id="n-canidad" class="form-control" required>
                            </div>
                            <label for="det_preciounitario">Precio unitario:</label>
                            <div class="mb-3">
                                <input name="det_preciounitario" type="number" id="n-canidad" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                 <a href="{{route('detalles',$idfactura)}}" class="mod-cancelar">CANCELAR</a>
                                 <input type="submit" id="btn-n-guardarP" value="GUARDAR" class="mod-guardar"/>
                            </div>
                            </form>
                        
                    </div>
                  
@stop

@section('css')
    <style>
select,input{
    width: 200px;
    height: 30px;
    border: lightgray 1px solid;
    border-radius: 4px;    
}
#balance{
    color: green;
}
#btn-rep-detF{
    font:bold;    
    background: #9cbbac;
    border: none;
}
#nuevo-reg-detF{
    font:bold;    
    border: none;
    background: #c2d4bb;
}
#editar{
    background: #9cbbac;
}
.mod-cancelar{
    width: 100px;
    height: 30px;
    font: bold;
    background: #c2d4bb;
    border-radius: 3px;  
    border: none;
    text-decoration: none;
    text-align: center;
    color: white;
}
.boton{    
    width: 75px;
    font:bold;    
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

form{
    width: 50%;
}
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
@stop
