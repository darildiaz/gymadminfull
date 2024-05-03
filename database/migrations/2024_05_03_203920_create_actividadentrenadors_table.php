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
        Schema::create('actividadentrenadors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actividad_id')
            ->contrained('actividad')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('entrenadors_id')
            ->contrained('entrenadors')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }
    //$table->foreignId(actividad::class);
    //$table->foreignId(entrenador::class);
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividadentrenadors');
    }
};
