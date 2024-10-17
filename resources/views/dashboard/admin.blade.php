@extends('layouts.dashboard')

@section('content')
    <h1>Libros</h1>
    <a href="{{ route('admin.libros.create') }}" class="btn btn-primary">Agregar Libro</a>
    <table class="table mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Autor</th>
                <th>En Préstamo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <td>{{ $libro->nombre }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->en_prestamo ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
