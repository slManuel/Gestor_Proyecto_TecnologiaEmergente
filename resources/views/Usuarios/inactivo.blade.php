@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <h1 id="titulo">Posees un usuario inactivo</h1>
@stop

@section('css')
    <style>
        #titulo{
            text-align:center;
            justify-content:center;
            display:flex;
            align-items: center;
            margin-top: 100px;
            font-family: Courier; 
            font-size: 100px;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
