@extends('layouts.layout')

@section('titulo', 'detalle del proyecto')

@section('content')
    <h1 class="tex-center pt-5 pb-3">Detalle del proyecto</h1>
    <div class="row">
        <div class="col-sm-3">
            <h3>Nombre</h3>
            <p>{{ $proyecto->nombre }}</p>
        </div>
    <div class="row">
        <div class="col-sm-3">
            <h3>Duracion:</h3>
        </div>
        <div>
            <p>{{ $proyecto->duracion }}</p>
        </div>
    </div>
    <a href="{{route('proyectos.index')}}" class="btn btn-primary mt-3">Volver</a>
@endsection