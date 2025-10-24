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
        Schema::create('feria_stand', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feria_id');
            $table->unsignedBigInteger('stand_id');
            $table->text('image');
            $table->timestamps();

            // definir las claves foráneas
            $table->foreign('feria_id')->references('id')->on('ferias')->onDelete('cascade');
            $table->foreign('stand_id')->references('id')->on('stands')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feria_stand');
    }
};
