<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        $categoryId = DB::table('category')->inRandomOrder()->first()->id;
        $price = fake()->numberBetween(100000, 1000000);
        return [
            'name' => fake()->name(),
            'price' => (int) round($price / 1000) * 1000,
            'description' => fake()->paragraph,
            'category_id' => $categoryId, // Liên kết với Category
        ];
    }
}
