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
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correoElectronico');
            $table->string('empresa');
            //            $table->string('intereses');
            $table->string('numeroCelular');

            $table->unsignedBigInteger('feria_id');
            $table->unsignedBigInteger('stand_id')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('feria_id')->references('id')->on('ferias')->onDelete('cascade');
            $table->foreign('stand_id')->references('id')->on('stands')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendees');
    }
};
