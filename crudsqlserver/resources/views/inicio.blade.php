@extends('layout/plantilla')

@section('tituloPagina', 'Crud con Laravel 8')

@section('contenido')

<div class="card">
    <h5 class="card-header"> CRUD con laravel 8 y SQL Server </h5>
    <div class="card-body">
        <h5 class="card-title text-center"> Listado de personas en el sistema </h5>
        <p>
            <a href="{{ route("personas.create") }}" class="btn btn-primary">
                <span class="fas fa-user-plus"></span> Agregar nueva persona
            </a>
        </p>
        <hr>
        <p class="card-text">
            <table class="table table-sm table-bordered">
                <thead>
                    <th> Nombre </th>
                    <th> Apellido </th>
                    <th> Fecha de nacimiento </th>
                    <th> Editar </th>
                    <th> Eliminar </th>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->apellido }}</td>
                            <td>{{ $item->fecha_nacimiento }}</td>
                            <td>
                                <form action="{{ route("personas.edit", $item->id) }}" method="GET">
                                    <button class="btn btn-warning btn-sm">
                                        <span class="fas fa-user-edit"></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route("personas.show", $item->id) }}" method="GET">
                                    <button class="btn btn-danger btn-sm">
                                        <span class="fas fa-user-times"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </p>
    </div>
</div>

@endsection
