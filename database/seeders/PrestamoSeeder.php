<?php

namespace Database\Seeders;

use App\Models\Prestamo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::all(); // Obtiene todos los usuarios

        // Verifica si hay suficientes usuarios para asignar bibliotecario y solicitante
        if ($usuarios->count() < 2) {
            $this->command->info('No hay suficientes usuarios para crear préstamos.');
            return;
        }

        // Datos de ejemplo para la tabla 'prestamo'
        $prestamos = [
            [
                'bibliotecario' => $usuarios->random()->id,
                'solicitante' => $usuarios->random()->id,
                'estado' => 'A',
                'cantidad' => 1,
                'fecha_prestamo' => '2024-08-21',
                'fecha_devolucion' => '2024-09-21',
            ],
            [
                'bibliotecario' => $usuarios->random()->id,
                'solicitante' => $usuarios->random()->id,
                'estado' => 'P',
                'cantidad' => 2,
                'fecha_prestamo' => '2024-08-22',
                'fecha_devolucion' => '2024-09-22',
            ],
            // Agrega más préstamos según sea necesario
        ];

        // Inserta los datos en la base de datos
        foreach ($prestamos as $prestamo) {
            Prestamo::create($prestamo);
        }
    }
}
