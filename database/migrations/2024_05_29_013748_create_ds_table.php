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
        Schema::create('ds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id');
            $table->string('ta')->nullable();
            $table->integer('kepedulianKepri')->nullable();
            $table->integer('persekutuanKepri')->nullable();
            $table->integer('kesetiaanyskiKepri')->nullable();
            $table->integer('kesetiaanpimKepri')->nullable();
            $table->integer('modelPeda')->nullable();
            $table->integer('samaortuSos')->nullable();
            $table->integer('kompkeilmuProfesional')->nullable();
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
        Schema::dropIfExists('ds');
    }
};
