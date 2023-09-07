<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $faker = Factory::create();

        Categorie::create(['name' => 'category_1']);
        Categorie::create(['name' => 'category_2']);
        Categorie::create(['name' => 'category_3']);
        Categorie::create(['name' => 'category_4']);

        for ($i=1; $i <= 10; $i++) { 
            
            $title =  $faker->sentence(4); 
            $slug = $faker->slug(); 

            Product::create([

                'name' =>  $title,
                'slug' => $slug,
                'subtitle' => $faker->text(50),
                'description' => $faker->paragraph(4), // Utilisez des paragraphes
                'price' => $faker->numberBetween(1500, 5000),
                'image' => 'http://www.w3.org/2000/svg', // Utilisez une URL d'image aléatoire

            ])->categories()
            ->attach([
                rand(1,4),
                rand(1,4),
            ]);
        }
    }
}
        
