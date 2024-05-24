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
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actividads_id')
            ->contrained('actividads')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->integer('dias');
            $table->integer('precio');
            $table->foreignId('gym_id')
            ->contrained('gyms')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->timestamps();
            $table->foreignId('impuestos_id')
            ->contrained('impuestos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('descripcion');
            $table->decimal('cantidad', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifas');
    }
};
