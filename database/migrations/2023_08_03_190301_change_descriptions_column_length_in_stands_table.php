<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('stands', function (Blueprint $table) {
            $table->text('descriptions')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Si necesitas revertir los cambios, implementa el método down() con el tipo original de la columna
        Schema::table('stands', function (Blueprint $table) {
            $table->string('descriptions')->change();
        });
    }
};
