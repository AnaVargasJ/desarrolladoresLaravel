@extends('layouts.layout')

@section('titulo', 'Editar proyecto')

@section('content')
<h1 class="text-center my-5">Editar proyecto</h1>
@if ($errors->any())

<div class ="alert alert-danger">
    <div class="header">
        <strong>Ups...</strong>algo salio mal
    </div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif
<form action="{{ route('proyectos.update', $proyecto->id) }}" method="post">
    @method('put')
    @csrf
    <div>
        <label for="nombre" class="form-label texto my-2"><h4>Nombre del proyecto</h4></label>
        <input type="text" name="nombre" id="nombre" value="{{ $proyecto->nombre }}" class="form-control" required="required">
    </div>
    <div>
        <label for="duracion" class="form-label texto my-2"><h4>Duracion del proyecto en meses</h4></label>
        <input type="number" name="duracion" id="duracion"value="{{ $proyecto->duracion }}" class="form-control" required="required">
    </div>
    <div>
        <button type="submit" class="btn btn-primary my-2"> Guardar </button>
    </div>
</form>
@endsection