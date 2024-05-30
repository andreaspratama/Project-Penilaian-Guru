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
        Schema::create('rks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id');
            $table->string('ta')->nullable();
            $table->integer('perilakuKepri')->nullable();
            $table->integer('tuturkataKepri')->nullable();
            $table->integer('kepedulianKepri')->nullable();
            $table->integer('penampilanKepri')->nullable();
            $table->integer('sikerKepri')->nullable();
            $table->integer('samapendSos')->nullable();
            $table->integer('samatenpendSos')->nullable();
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
        Schema::dropIfExists('rks');
    }
};
