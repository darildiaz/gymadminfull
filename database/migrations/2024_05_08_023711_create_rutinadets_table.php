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
        Schema::create('rutinadets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rutina_id')
            ->contrained('rutinas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('ejercicios_id')
            ->contrained('ejercicios')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->integer('repeticion');
            $table->integer('descanso');
            $table->foreignId('gyms_id')
            ->contrained('gyms')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutinadets');
    }
};
