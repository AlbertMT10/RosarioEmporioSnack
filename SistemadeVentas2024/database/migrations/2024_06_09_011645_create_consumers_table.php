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
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Nombre
            $table->string('last_name'); // Apellido
            $table->date('birth_date'); // Fecha de nacimiento
            $table->string('nationality'); // Nacionalidad
            $table->string('phone_number'); // Número de teléfono
            $table->string('email')->unique(); // Correo electrónico
            $table->string('address'); // Dirección
            $table->string('city'); // Ciudad
            $table->string('state'); // Estado/Provincia
            $table->string('country'); // País
            $table->string('postal_code'); // Código postal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumers');
    }
};
