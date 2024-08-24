<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'password' => Hash::make('password123'), // Hashea la contraseña
            ],
            [
                'name' => 'Ana Gómez',
                'email' => 'ana.gomez@example.com',
                'password' => Hash::make('password123'), // Hashea la contraseña
            ],
            // Agrega más usuarios si es necesario
        ];

        // Inserta los datos en la base de datos
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
