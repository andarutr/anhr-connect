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
            $table->timestamp('date_interview_user')->nullable();
            $table->string('url_interview_user', 255)->nullable();
            $table->unsignedBigInteger('master_user_id')->nullable();

            $table->foreign('master_user_id')->references('id')->on('master_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['master_user_id']);
            $table->dropColumn(['date_interview_user','url_interview_user','master_user_id']);
        });
    }
};
