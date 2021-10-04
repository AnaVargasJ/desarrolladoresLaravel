@extends('layouts.layout')

@section('titulo', 'detalle del desarrollador)

@section('content')
    <h1 class="tex-center pt-5 pb-3">Detalle del  desarrollador</h1>
    <div class="row">
        <div class="col-sm-3">
            <h3>Nombre:</h3>
            <p>{{ $proyecto->nombre }}</p>
        </div>
    <div class="row">
        <div class="col-sm-3">
            <h3>Apellido:</h3>
        </div>
        <div class="row">
        <div class="col-sm-3">
            <h3>Telfono:</h3>
        </div>
        <div class="row">
        <div class="col-sm-3">
            <h3>Direccion:</h3>
        </div>
        <div class="col-sm-3">
            <p>{{ $desarrollador->apellido }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h3>Proyecto actual:</h3>
        </div>
        <div>
        <div class="col-sm-3">
            <p>{{ $desarrollador->nombreProyecto }}</p>
        </div>
    <a href= "{{route('desarrollador.index')}}" class="btn btn-primary mt-3">Volver</a>
@endsection