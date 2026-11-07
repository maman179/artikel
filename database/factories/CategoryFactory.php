<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = fake()->sentence(rand(3, 4), false);
        return [
            'name' => fake()->sentence(rand(1, 2), false),
            'slug' => Str::slug($category)
        ];
    }
}
