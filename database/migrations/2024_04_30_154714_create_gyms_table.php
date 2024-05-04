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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('longitud');
            $table->double('latitud');
            $table->text('descripcion');
            $table->text('imagen');
            $table->foreignId('categorias_id')
            ->contrained('categorias')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->boolean('habilitado')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};
