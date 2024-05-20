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
        Schema::create('dietas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('dias');
            $table->foreignId('clientes_id')
            ->contrained('clientes')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('entrenadors_id')
            ->contrained('entrenadors')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
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
        Schema::dropIfExists('dietas');
    }
};
