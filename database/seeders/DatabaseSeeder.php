<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Receta;
use App\Models\categoria;
use App\Models\Etiqueta;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(29)->create();

        User::factory()->create([
            'name' => 'Kenneth Adriel Ramirez Garcia',
            'email' => 'kennethramirez@admin.com',
        ]);

        categoria::factory(10)->create();
        Receta::factory(100)->create();
        Etiqueta::factory(50)->create();

        // Relacion de muchos a muchos
        $Receta = Receta::all();
        $Etiquetas = Etiqueta::all();

        foreach ($Receta as $recetas){
            $recetas->etiquetas()->attach($Etiquetas->random(rand(2,4)));
        }

    }
}
