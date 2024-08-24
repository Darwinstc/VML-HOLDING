<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libro';

    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'ano_publicacion',
        'genero',
        'numero_paginas',
        'idioma',
        'resumen',
        'cantidad_ejemplares',
        'cantidad_stock',
        'estado',
    ];

}
