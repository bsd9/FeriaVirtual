<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('representative');
            $table->string('address');
            $table->date('startDate'); // Nueva columna: fecha de inicio
            $table->date('endDate');   // Nueva columna: fecha de fin
            $table->string('city');    // Nueva columna: ciudad
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('images');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ferias');
    }
};
