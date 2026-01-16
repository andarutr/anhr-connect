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
        Schema::create('resigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('file_pengajuan', 128);
            $table->string('file_paklaring', 128)->nullable();
            $table->enum('is_approve',['y','n'])->nullable();
            $table->string('approve_by', 128)->nullable();
            $table->string('reject_by', 128)->nullable();
            $table->enum('status',['waiting', 'approved', 'rejected', 'notice_period', 'done'])->default('waiting');
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resigns');
    }
};
