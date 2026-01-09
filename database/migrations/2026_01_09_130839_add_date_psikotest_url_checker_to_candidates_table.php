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
            $table->timestamp('date_psikotest')->nullable();
            $table->string('url_psikotest', 255)->nullable();
            $table->unsignedBigInteger('master_checker_id')->nullable();

            $table->foreign('master_checker_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['master_checker_id']);
            $table->dropColumn(['date_psikotest','url_psikotest','master_checker_id']);
        });
    }
};
