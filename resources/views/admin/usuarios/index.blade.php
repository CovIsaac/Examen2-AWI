@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .container h1 {
        margin-bottom: 20px;
        font-size: 2rem;
        text-align: center;
        color: #333;
    }
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        display: block;
        text-align: center;
        margin: 10px auto;
        width: fit-content;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f4f4f9;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .btn-success, .btn-danger {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        color: white;
        text-decoration: none;
    }
    .btn-success {
        background-color: #28a745;
    }
    .btn-danger {
        background-color: #dc3545;
    }
    .btn-success:hover {
        background-color: #218838;
    }
    .btn-danger:hover {
        background-color: #c82333;
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
<div class="container">
    <h1>Administrar Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario) }}" class="btn-success">Editar</a>
                        <button class="btn-danger" onclick="showPopup({{ $usuario->id }})">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('usuarios.create') }}" class="btn-primary">Agregar Usuario</a>
</div>

<div class="popup" id="popup">
    <div class="popup-content">
        <p>¿Estás seguro de que deseas eliminar este usuario?</p>
        <form id="form-delete" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-confirm">Aceptar</button>
            <button type="button" class="btn-cancel" onclick="hidePopup()">Cancelar</button>
        </form>
    </div>
</div>

<script>
    function showPopup(id) {
        document.getElementById('form-delete').action = `usuarios/${id}`;
        document.getElementById('popup').style.display = 'flex';
    }

    function hidePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>
@endsection
