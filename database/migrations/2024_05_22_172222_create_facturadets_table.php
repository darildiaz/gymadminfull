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
        Schema::create('facturadet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facturas_id')
            ->contrained('facturas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('impuestos_id')
            ->contrained('impuestos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('descripcion');
            $table->decimal('cantidad', 10, 2)->nullable();
            $table->integer('precio');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturadet');
    }
};
