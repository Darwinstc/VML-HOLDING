<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_prestamo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestamo_id')->constrained('prestamo')->onDelete('cascade');
            $table->foreignId('libro_id')->constrained('libro')->onDelete('cascade');
            $table->tinyInteger('cantidad');
            $table->char('estado',1);
            $table->char('estado_entrega');
            $table->char('estado_devolucion');
            $table->date('fecha_devolucion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_prestamo');
    }
};
