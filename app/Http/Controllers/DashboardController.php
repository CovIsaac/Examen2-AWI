<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar si se recuperan los libros y préstamos
        $libros = Libro::all();
        $prestamos = Prestamo::all();

        // Mostrar los datos en el log para depurar
        logger($libros);
        logger($prestamos);

        // Enviar las variables a la vista
        return view('dashboard', compact('libros', 'prestamos'));
    }
}
