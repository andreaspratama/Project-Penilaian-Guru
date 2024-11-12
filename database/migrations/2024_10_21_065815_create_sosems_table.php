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
        Schema::create('sosems', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id');
            $table->bigInteger('user_id');
            $table->string('ta')->nullable();
            $table->integer('valuePeda')->nullable();
            $table->integer('manajPeda')->nullable();
            $table->integer('lmsPeda')->nullable();
            $table->integer('modelPeda')->nullable();
            $table->integer('mediaPeda')->nullable();
            $table->integer('kerjasoSos')->nullable();
            $table->integer('kompdigProfesional')->nullable();
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
        Schema::dropIfExists('sosems');
    }
};
