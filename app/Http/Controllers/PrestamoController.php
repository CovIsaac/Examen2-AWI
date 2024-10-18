<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function create()
    {
        $libros = Libro::all();
        $clientes = Cliente::all();
        return view('prestamos.create', compact('libros', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_libro' => 'required|string',
            'nombre_cliente' => 'required|string',
        ]);

        Prestamo::create([
            'nombre_libro' => $request->nombre_libro,
            'nombre_cliente' => $request->nombre_cliente,
            'fecha_prestamo' => now(), // Fecha automática
        ]);

        // Marcar el libro como prestado
        $libro = Libro::where('nombre', $request->nombre_libro)->first();
        $libro->en_prestamo = true;
        $libro->save();

        return redirect()->route('dashboard');
    }

    public function devolver($id)
    {
        $prestamo = Prestamo::find($id);
        if ($prestamo) {
            // Marcar el libro como no prestado
            $libro = Libro::where('nombre', $prestamo->nombre_libro)->first();
            if ($libro) {
                $libro->en_prestamo = false;
                $libro->save();
            }

            // Eliminar el registro de préstamo
            $prestamo->delete();
        }

        return redirect()->route('dashboard');
    }
}
