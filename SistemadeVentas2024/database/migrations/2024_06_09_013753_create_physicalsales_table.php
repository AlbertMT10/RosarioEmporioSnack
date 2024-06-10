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
        Schema::create('physicalsales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id'); //quien le vendio
            $table->string('name'); // Nombre del cliente
            $table->string('dni')->nullable(); // DNI del cliente
            $table->unsignedBigInteger('product_id'); //producto que compro
            $table->unsignedInteger('quantity'); // Campo para la cantidad de productos vendidos
            $table->decimal('total', 10, 2); // Total de la venta
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physicalsales');
    }
};
