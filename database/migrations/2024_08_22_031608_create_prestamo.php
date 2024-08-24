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
        Schema::create('prestamo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bibliotecario')->constrained('users')->onDelete('cascade');
            $table->foreignId('solicitante')->constrained('users')->onDelete('cascade');
            $table->char('estado',1);
            $table->tinyInteger('cantidad');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamo');
    }
};
