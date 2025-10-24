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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('ifrema_2')->nullable()->after('ifrema');
            $table->string('ifrema_3')->nullable()->after('ifrema_2');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $columnsToDelete = ['ifrema_3', 'ifrema_2'];
            $table->dropColumn($columnsToDelete);
        });
    }
};
