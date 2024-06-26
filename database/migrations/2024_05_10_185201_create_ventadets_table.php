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
        Schema::create('ventadets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ventas_id')
            ->contrained('ventas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('productos_id')
            ->contrained('productos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->decimal('cantidad', 10, 2)->nullable();

            $table->decimal('precio', 10, 2)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventadets');
    }
};
