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
            $table->timestamp('date_technical')->nullable();
            $table->string('url_technical', 255)->nullable();
            $table->unsignedBigInteger('checker_technical_id')->nullable();

            $table->foreign('checker_technical_id')->references('id')->on('master_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['checker_technical_id']);
            $table->dropColumn(['date_technical','url_technical','checker_technical_id']);
        });
    }
};
