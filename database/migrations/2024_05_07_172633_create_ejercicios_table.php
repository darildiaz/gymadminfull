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
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipoejercicios_id')
            ->contrained('tipoejercicios')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('maquinas_id')
            ->contrained('maquinas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('nombre_ejercicio');
            $table->text('descripcion_ejercicio');
            $table->foreignId('gym_id')
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
        Schema::dropIfExists('ejercicios');
    }
};
