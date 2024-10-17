<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    public function run()
    {
        // Crear algunos libros de ejemplo
        Libro::create(['nombre' => 'El Quijote', 'autor' => 'Miguel de Cervantes', 'en_prestamo' => false]);
        Libro::create(['nombre' => 'Cien años de soledad', 'autor' => 'Gabriel García Márquez', 'en_prestamo' => false]);
    }
}
