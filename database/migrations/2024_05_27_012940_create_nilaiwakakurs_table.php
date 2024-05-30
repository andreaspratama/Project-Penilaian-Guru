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
        Schema::create('nilaiwakakurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id');
            $table->string('ta')->nullable();
            $table->integer('penamKepri')->nullable();
            $table->integer('sikerKepri')->nullable();
            $table->integer('maskerKepri')->nullable();
            $table->integer('kesetiaanpimKepri')->nullable();
            $table->integer('valuePeda')->nullable();
            $table->integer('manajkelasPeda')->nullable();
            $table->integer('lmsPeda')->nullable();
            $table->integer('modelpemPeda')->nullable();
            $table->integer('mediaPeda')->nullable();
            $table->integer('kualitaspemPeda')->nullable();
            $table->integer('samapendSos')->nullable();
            $table->integer('organisasiSos')->nullable();
            $table->integer('kompkeilmuProfesional')->nullable();
            $table->integer('kompdigProfesional')->nullable();
            $table->integer('seminarProfesional')->nullable();
            $table->integer('hasil')->nullable();
            $table->string('role')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilaiwakakurs');
    }
};
