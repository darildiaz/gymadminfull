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
        Schema::create('entrenadors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->contrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('nombre_entrenador');
            $table->string('apellido_entrenador');
            $table->string('telefono');
            $table->string('telefono_emergencia');
            $table->string('Sexo');
            $table->text('especialidad');
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
        Schema::dropIfExists('entrenadors');
    }
};
