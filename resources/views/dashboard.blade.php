@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .btn-secret {
        background-color: #dc3545; /* Color de fondo rojo */
        color: white; /* Color del texto */
        border: none; /* Sin bordes */
        border-radius: 5px; /* Bordes redondeados */
        padding: 10px 20px; /* Relleno */
        font-size: 16px; /* Tamaño del texto */
        cursor: pointer; /* Puntero de ratón */
    }

    .btn-secret:hover {
        background-color: #c82333; /* Color de fondo al pasar el ratón */
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f4f4f9;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .btn-primary, .btn-success {
        display: inline-block;
        padding: 10px 20px;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .d-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Estilos para la ventana emergente */
    .popup {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .popup-content button {
        margin-top: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-cancel {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-confirm {
        background-color: #28a745;
        color: #fff;
    }
</style>

<div class="container mt-4">
    <div class="d-flex mb-4">
        <h2>Libros</h2>
        <a href="{{ route('libros.create') }}" class="btn btn-primary">Agregar Libro</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Autor</th>
                <th>En Préstamo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($libros as $libro)
                <tr>
                    <td>{{ $libro->nombre }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->en_prestamo ? 'Sí' : 'No' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay libros disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex mb-4">
        <h2>Préstamos</h2>
        <a href="{{ route('prestamos.create') }}" class="btn btn-primary">Agregar Préstamo</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Libro</th>
                <th>Cliente</th>
                <th>Fecha de Préstamo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->nombre_libro }}</td>
                    <td>{{ $prestamo->nombre_cliente }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>
                        <button class="btn btn-success" onclick="showPopup({{ $prestamo->id }})">Devolver</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay préstamos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if(auth()->user() && auth()->user()->isAdmin())
    <div class="mt-4" style="text-align: center;">
        <form action="{{ route('usuarios.index') }}" method="GET">
            <button type="submit" class="btn btn-danger btn-secret">Administrar Usuarios</button>
        </form>
    </div>
@endif


<div class="popup" id="popup">
    <div class="popup-content">
        <p>¿Ya se ha devuelto?</p>
        <form id="form-devolver" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-confirm">Aceptar</button>
            <button type="button" class="btn-cancel" onclick="hidePopup()">Cancelar</button>
        </form>
    </div>
</div>



<script>
    function showPopup(id) {
        document.getElementById('form-devolver').action = `/prestamos/${id}/devolver`;
        document.getElementById('popup').style.display = 'flex';
    }

    function hidePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>
@endsection
