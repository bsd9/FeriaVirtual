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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id(); // ID del visitante
            $table->string('name'); // Nombre del visitante (opcional)
            $table->string('last name'); //apellido;
            $table->string('email'); // Dirección de correo electrónico (opcional)
            $table->string('nationality')->nullable(); // Nacionalidad (opcional)
            $table->string('ip_address'); // Dirección IP del visitante
            $table->string('user_agent'); // Navegador web y sistema operativo
            $table->string('device'); // Tipo de dispositivo (escritorio, móvil, tableta)
            $table->unsignedInteger('session_duration')->nullable(); // Duración de la sesión en segundos
            $table->string('geolocation')->nullable(); // Geolocalización
            $table->timestamps(); // Campos de registro de creación y actualización

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
