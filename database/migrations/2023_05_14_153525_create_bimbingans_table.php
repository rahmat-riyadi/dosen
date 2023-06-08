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
        Schema::create('bimbingan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->unsignedBigInteger('dosen_1_id');
            $table->foreign('dosen_1_id')->references('id')->on('dosen');
            $table->unsignedBigInteger('dosen_2_id');
            $table->foreign('dosen_2_id')->references('id')->on('dosen');
            $table->string('file')->nullable();
            $table->string('judul')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingan');
    }
};
