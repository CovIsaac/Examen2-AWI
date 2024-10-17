<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Usuario Administrador
        User::create([
            'nombre' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'rol' => 'admin',
        ]);

        // Usuario Bibliotecario
        User::create([
            'nombre' => 'Bibliotecario',
            'email' => 'bibliotecario@example.com',
            'password' => Hash::make('password'),
            'rol' => 'bibliotecario',
        ]);
    }
}
