@extends('layouts.layout')

@section('titulo', 'Editar Desarrollador')

@section('content')
<h1 class="text-center my-5">Editar desarrollador</h1>
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
<form action="{{ route('desarrolladores.update', $desarrollador->id) }}" method="post">
    @method('put')
    @csrf
    <div>
        <label for="nombre" class="form-label "><h4>Nombre del desarrollador</h4></label>
        <input type="text" name="nombre" id="nombre" value="{{ $proyecto->nombre }}" class="form-control" >
    </div>
    <div>
        <label for="duracion" class="form-label ">Apellido del desarrollador</label>
        <input type="number" name="apellido" id="duracion"value="{{ $desarrollador->apellido }}" class="form-control" >
    </div>
    <div>
        <label for="duracion" class="form-label ">Direccion del desarrollador</label>
        <input type="number" name="direccion" id="duracion"value="{{ $desarrollador->direccion }}" class="form-control" >
    </div>
    <div>
        <label for="duracion" class="form-label ">Telefono del desarrollador</label>
        <input type="number" name="telefono" id="duracion"value="{{ $desarrollador->telefono }}" class="form-control" >
    </div>
    <div>
        <button type="submit" class="btn btn-primary my-2"> Guardar </button>
    </div>
    <div class="mb-3">
        <label for="proyectoId" class="form-label">Proyecto</label>
        <select name="proyectoId" id="proyectoId" class="form-control">
            @foreach ($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}"
                    @if ($desarrollador->proyectoId == $proyecto->id)
                    selected
                        
                    @endif
                    >
                    {{ $proyecto->nombre }}</option>
            @endforeach
        </select>
    </div>
</form>
@endsection