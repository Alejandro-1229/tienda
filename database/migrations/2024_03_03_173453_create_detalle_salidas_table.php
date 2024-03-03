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
        Schema::create('detalle_salidas', function (Blueprint $table) {
            $table->id('idDetalleOutpu');
            $table->integer('cantidad');
            $table->foreignId('idOutput')->constrained('reporte_salidas','idOutput')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('idProducto')->constrained('productos','idProducto')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_salidas');
    }
};
