<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE TYPE candidate_status AS ENUM (
            'applied', 'screening', 'interview', 'offered', 'rejected', 'hired'
        )");
        
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('no_apply', 128)->unique();
            $table->string('nama_lengkap', 128);
            $table->string('nama_panggilan', 50);
            $table->integer('umur');
            $table->text('alamat_rumah');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('kelurahan', 128);
            $table->string('kecamatan', 128);
            $table->string('no_ktp', 50);
            $table->string('no_kk', 100);
            $table->string('email', 128)->unique();
            $table->string('posisi_dilamar', 50);
            $table->string('cv_terbaru', 128);
            $table->string('skck_terbaru', 128);
            $table->string('ket_sehat_terbaru', 128);
            $table->enum('status', [
                'applied', 'screening', 'interview', 'offered', 'rejected', 'hired'
            ])->default('applied');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
