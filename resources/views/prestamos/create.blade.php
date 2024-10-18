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

    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .btn-primary {
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
</style>

<div class="container mt-4">
    <h1 class="mb-4">Agregar Préstamo</h1>
    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_libro" class="form-label">Nombre del Libro</label>
            <select class="form-control" id="nombre_libro" name="nombre_libro" required>
                @foreach($libros as $libro)
                    <option value="{{ $libro->nombre }}">{{ $libro->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
            <select class="form-control" id="nombre_cliente" name="nombre_cliente" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->nombre}} {{$cliente->apellido}}">{{ $cliente->nombre}} {{$cliente->apellido}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
