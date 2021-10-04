@extends('layouts.layout')

@section('titulo', 'crear nuevo proyecto')

@section('content')
<h1 class="text-center my-5">Crear nuevo proyecto</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <div class="header"><strong>Ups...</strong>algo salió mal</div>
        <ul>
            @foreach ($errors->all as $error )
            <li>{{$errors}}</li>                
            @endforeach
        </ul>
    </div>
@endif

<br></br>
<form action="{{route('proyectos.store')}}" method="post">
    @csrf
    @method('post')
    <div >
        <label for="nombre" class="form-label texto my"> <h4>Nombre del proyecto</h4></label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del proyecto" value="{{old('nombre')}}">
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label texto my"> <h4>Duracion del proyecto en meses</h4></label>
        <input type="number" class="form-control" name="duracion" id="duracion" placeholder="0" value="{{old('duracion')}}" >
    </div>
    <button type="submit" class="btn btn-primary my-2">Guardar</button>
</form>
@endsection