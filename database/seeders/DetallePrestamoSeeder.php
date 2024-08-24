<?php

namespace Database\Seeders;

use App\Models\DetallePrestamo;
use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetallePrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prestamos = Prestamo::all();
        $libros = Libro::all();

        if ($prestamos->isEmpty() || $libros->isEmpty()) {
            $this->command->info('No hay suficientes préstamos o libros para crear detalles de préstamos.');
            return;
        }

        $detallePrestamos = [
            [
                'prestamo_id' => $prestamos->random()->id,
                'libro_id' => $libros->random()->id,
                'cantidad' => 1,
                'estado' => 'A',
                'estado_entrega' => 'P',
                'estado_devolucion' => 'N',
                'fecha_devolucion' => '2024-09-21',
            ],
            [
                'prestamo_id' => $prestamos->random()->id,
                'libro_id' => $libros->random()->id,
                'cantidad' => 2,
                'estado' => 'P',
                'estado_entrega' => 'N',
                'estado_devolucion' => 'N',
                'fecha_devolucion' => '2024-10-21',
            ],
        ];

        // Inserta los datos en la base de datos
        foreach ($detallePrestamos as $detallePrestamo) {
            DetallePrestamo::create($detallePrestamo);
        }
    }
}
