@extends('layout/plantilla')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<div class="card">
    <h5 class="card-header">Actualizar nueva persona</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('personas.update', $personas->id) }}" method="POST">
                @csrf
                @method("PUT")
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{$personas->nombre}}">
                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control" required value="{{$personas->apellido}}">
                <label for="">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required value="{{$personas->fecha_nacimiento}}">
                <br>
                <a href="{{ route("personas.index") }}" class="btn btn-info" >
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-warning">
                    <span class="fas fa-user-edit"></span> Actualizar
                </button>

            </form>
        </p>

    </div>
</div>
@endsection
