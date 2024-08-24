<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePrestamo extends Model
{
    use HasFactory;

    protected $table = 'detalle_prestamo';

    // Define los campos que pueden ser asignados masivamente
    protected $fillable = [
        'prestamo_id',
        'libro_id',
        'cantidad',
        'estado',
        'estado_entrega',
        'estado_devolucion',
        'fecha_devolucion',
    ];

    // Define las relaciones con otros modelos
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
