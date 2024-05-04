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
        Schema::create('suscripcions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actividads_id')
            ->contrained('actividads')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('clientes_id')
            ->contrained('clientes')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('gym_id')
            ->contrained('gyms')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->boolean('habilitado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripcions');
    }
};
