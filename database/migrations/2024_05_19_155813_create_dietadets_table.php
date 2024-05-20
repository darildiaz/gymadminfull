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
        Schema::create('dietadet', function (Blueprint $table) {
            $table->id();
            $table->time('horario');
            $table->integer('cantidad');
            $table->foreignId('comidas_id')
            ->contrained('comidas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('dietas_id')
            ->contrained('dietas')
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
        Schema::dropIfExists('dietadet');
    }
};
