<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $faker = Factory::create();

        Categorie::create(['name' => 'technologie']);
        Categorie::create(['name' => 'accessoire']);
        Categorie::create(['name' => 'jeux']);
        Categorie::create(['name' => 'vetement']);

        Roles::create(['name' => 'Admin']);
        Roles::create(['name' => 'utilisateur']);
        

       $admin = User::create(

            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make("password"),
                
            ]
        );

        $user = User::create(

            [
                'name' => 'momo',
                'email' => 'momo@gmail.com',
                'password' => Hash::make("password"),
                
            ]
        );


        $admin->roles()->attach([1,2]);
        $user->roles()->attach([2]);
        
        for ($i=1; $i <= 10; $i++) { 
            
            $title =  $faker->sentence(4); 
            $slug = $faker->slug(); 

            Product::create([

                'name' =>  $title,
                'slug' => $slug,
                'subtitle' => $faker->text(50),
                'description' => $faker->paragraph(4), 
                'price' => $faker->numberBetween(1500, 5000),
                'image' => 'http://www.w3.org/2000/svg', 

            ])->categories()
              ->attach([
                rand(1,4),
                rand(1,4),
            ]);
        }
    }
}
        
