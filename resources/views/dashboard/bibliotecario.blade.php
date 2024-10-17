@extends('layouts.dashboard')

@section('content')
    <h1>Préstamos</h1>
    <a href="{{ route('admin.prestamos.create') }}" class="btn btn-primary">Registrar Préstamo</a>
    <table class="table mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Libro</th>
                <th>Cliente</th>
                <th>Fecha de Préstamo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->nombre_libro }}</td>
                    <td>{{ $prestamo->nombre_cliente }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>
                        <form action="{{ route('admin.prestamos.destroy', $prestamo->id) }}" method="POST" style="display:inline;">
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
