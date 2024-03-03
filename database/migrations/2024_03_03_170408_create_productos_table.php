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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idProducto');
            $table->char('estado',1);
            $table->string('SKU',10)->unique();
            $table->string('nombre',50);
            $table->decimal('precio');
            $table->integer('stock');
            $table->date('fechaVencimiento');
            $table->string('categoria',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
