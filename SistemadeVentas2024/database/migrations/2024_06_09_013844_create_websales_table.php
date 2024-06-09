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
        Schema::create('websales', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('web'); // Agregar el campo 'type' con un valor predeterminado de 'web'
            $table->unsignedBigInteger('consumer_id'); //quien le vendio
            $table->date('sale_date'); // Fecha de la venta
            $table->unsignedBigInteger('product_id'); //producto que compro
            $table->unsignedInteger('quantity'); // Campo para la cantidad de productos vendidos
            $table->decimal('total', 10, 2); // Total de la venta
            $table->foreign('consumer_id')->references('id')->on('consumers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websales');
    }
};
