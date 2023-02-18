<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->unique()->word();

        return [
            'name' => $name,
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
