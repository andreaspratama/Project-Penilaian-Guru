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
        Schema::create('nilaiks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id');
            $table->string('ta')->nullable();
            $table->integer('prilakuKepri')->nullable();
            $table->integer('tuturkataKepri')->nullable();
            $table->integer('keuanganKepri')->nullable();
            $table->integer('kepedulianKepri')->nullable();
            $table->integer('persekutuanKepri')->nullable();
            $table->integer('penampilanKepri')->nullable();
            $table->integer('sikapkerjaKepri')->nullable();
            $table->integer('masukkerjaKepri')->nullable();
            $table->integer('kesetianyskiKepri')->nullable();
            $table->integer('kesetianpimKepri')->nullable();
            $table->integer('manajkelasPeda')->nullable();
            $table->integer('kualitaspemPeda')->nullable();
            $table->integer('samaortuSos')->nullable();
            $table->integer('samapendSos')->nullable();
            $table->integer('samatenpendSos')->nullable();
            $table->integer('organisasiSos')->nullable();
            $table->integer('kompkeilmuProfesional')->nullable();
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
        Schema::dropIfExists('nilaiks');
    }
};
