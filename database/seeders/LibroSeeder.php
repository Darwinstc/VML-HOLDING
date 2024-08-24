<?php

namespace Database\Seeders;

use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $libros = [
            [
                'titulo' => 'Cien años de soledad',
                'autor' => 'Gabriel García Márquez',
                'editorial' => 'Editorial Sudamericana',
                'ano_publicacion' => '1967-06-05',
                'genero' => 'F',
                'numero_paginas' => 417,
                'idioma' => 'Español',
                'resumen' => 'Una novela que cuenta la historia de la familia Buendía a lo largo de varias generaciones en el pueblo ficticio de Macondo.',
                'cantidad_ejemplares' => 10,
                'cantidad_stock' => 7,
                'estado' => 'A',
            ],
            [
                'titulo' => '1984',
                'autor' => 'George Orwell',
                'editorial' => 'Secker & Warburg',
                'ano_publicacion' => '1949-06-08',
                'genero' => 'D',
                'numero_paginas' => 328,
                'idioma' => 'Inglés',
                'resumen' => 'Una novela distópica que explora los temas del totalitarismo, la vigilancia y la manipulación de la verdad.',
                'cantidad_ejemplares' => 15,
                'cantidad_stock' => 10,
                'estado' => 'A',
            ],
            // Agrega más libros según sea necesario
        ];

        // Inserta los datos en la base de datos
        foreach ($libros as $libro) {
            Libro::create($libro);
        }
    }
}
