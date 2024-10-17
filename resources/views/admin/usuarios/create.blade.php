@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        margin-bottom: 20px;
        font-size: 2rem;
        text-align: center;
        color: #333;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
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
        margin: 20px auto;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .alert {
        padding: 10px;
        background-color: #f44336;
        color: white;
        margin-bottom: 15px;
        border-radius: 5px;
    }
    .alert.success {
        background-color: #4CAF50;
    }
    .alert.close {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }
    .alert.close:hover {
        color: black;
    }
</style>
<div class="container">
    <h1>Agregar Usuario</h1>
    
    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert">
            @foreach ($errors->all() as $error)
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" id="rol" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="bibliotecario">Bibliotecario</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn-primary">Agregar</button>
    </form>
</div>
@endsection
