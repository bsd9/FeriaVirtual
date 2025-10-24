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
        Schema::create('facade_screen_fronts', function (Blueprint $table) {
            $table->id();
            $table->enum('position', ['principal', 'right', 'back', 'left'])->comment('Posicion de las imagenes en la fachada');
            $table->string('nombre')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facade_screen_fronts');
    }
};
