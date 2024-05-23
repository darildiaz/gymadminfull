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
        Schema::create('datosfacturas', function (Blueprint $table) {
            $table->id();
            $table->string('timbrado');
            $table->string('codigocontrol');
            $table->date('vigencia');
            $table->date('vencimiento');
            $table->string('ruc');
            $table->string('sucursal');
            $table->boolean('activo');
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
        Schema::dropIfExists('datosfacturas');
    }
};
