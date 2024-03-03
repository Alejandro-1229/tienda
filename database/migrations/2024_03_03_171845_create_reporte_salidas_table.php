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
        Schema::create('reporte_salidas', function (Blueprint $table) {
            $table->id('idOutput');
            $table->date('fechaReporte');
            $table->string('descripcion',500);
            $table->foreignId('idUsuario')->constrained('users','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_salidas');
    }
};
