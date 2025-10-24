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
            $table->unsignedBigInteger('exhibitor_id')->nullable();

            $table->foreign('exhibitor_id')->references('id')->on('exhibitors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('stands', function (Blueprint $table) {
            $table->dropForeign(['exhibitor_id']);
            $table->dropColumn('exhibitor_id');
        });
    }
};
