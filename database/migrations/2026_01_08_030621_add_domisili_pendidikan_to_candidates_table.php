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
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('domisili', 128);
            $table->string('pendidikan_terakhir', 10)->nullable();
            $table->string('universitas', 128)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn('domisili');
            $table->dropColumn('pendidikan_terakhir');
            $table->dropColumn('universitas');
        });
    }
};
