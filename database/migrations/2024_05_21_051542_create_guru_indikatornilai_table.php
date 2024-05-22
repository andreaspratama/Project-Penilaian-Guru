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
        Schema::create('guru_indikatornilai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id');
            $table->bigInteger('indikatornilai_id');
            $table->string('ta')->nullable();
            $table->string('prilaku')->nullable();
            $table->string('tuturkata')->nullable();
            $table->string('keuangan')->nullable();
            $table->string('kepedulian')->nullable();
            $table->string('persekutuan')->nullable();
            $table->string('penampilan')->nullable();
            $table->string('sikapkerja')->nullable();
            $table->string('masukkerja')->nullable();
            $table->string('kesetiaanyski')->nullable();
            $table->string('kesetiaanpimpinan')->nullable();
            $table->string('role')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_indikatornilai');
    }
};
