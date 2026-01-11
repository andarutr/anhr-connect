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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan', 128);
            $table->string('divisi', 50);
            $table->string('tipe_pekerjaan', 50);
            $table->text('deskripsi_pekerjaan');
            $table->text('syarat');
            $table->text('benefit');
            $table->bigInteger('start_salary');
            $table->bigInteger('end_salary');
            $table->date('close_post');
            $table->string('nama_poster', 128);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
