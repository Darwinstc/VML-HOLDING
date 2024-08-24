<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamo';

    protected $fillable = [
        'bibliotecario',
        'solicitante',
        'estado',
        'cantidad',
        'fecha_prestamo',
        'fecha_devolucion',
    ];

    public function bibliotecario()
    {
        return $this->belongsTo(User::class, 'bibliotecario');
    }

    public function solicitante()
    {
        return $this->belongsTo(User::class, 'solicitante');
    }

    public $timestamps = false;
}
