<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /*\App\Models\Categoria::factory()->create([
        'nombre' => 'Gym Example',
        ]);*/
         /*\App\Models\Gym::factory()->create([
            'nombre_gym' => 'Gym Example',
            'longitud' => 123.456,
            'latitud' => 78.901,
            'descripcion' => 'Descripción del gimnasio de ejemplo',
            'imagen' => 'url_de_la_imagen.jpg',
            'categorias_id' => 1, // Suponiendo que 1 es el ID de la categoría
        ]);*/

        \App\Models\User::factory()->create([
            'name' => 'darildiaz',
            'email' => 'darildiaz29@gmail.com',
             'password'=> Hash::make('12345678'),
             'gym_id' =>1,
        ]);

    }
}
