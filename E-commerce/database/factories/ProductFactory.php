<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4); // Utilisez un titre plus court
        $slug = $this->faker->slug(); // Laissez le deuxième argument vide pour un slug aléatoire
        
         return [
            'name' =>  $title,
            'slug' => $slug,
            'subtitle' => $this->faker->text(100),
            'description' => $this->faker->paragraph(4), // Utilisez des paragraphes
            'price' => $this->faker->numberBetween(1500, 1000000),
            'image' => 'http://www.w3.org/2000/svg', // Utilisez une URL d'image aléatoire
        ];
    }
    
}
