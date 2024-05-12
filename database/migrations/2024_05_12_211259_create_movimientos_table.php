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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ventas_id')
            ->contrained('ventas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('pagoss_id')
            ->contrained('pagoss')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('formapagos_id')
            ->contrained('formapagos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->decimal('importe', 10, 2)->nullable();
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
        Schema::dropIfExists('movimientos');
    }
};
