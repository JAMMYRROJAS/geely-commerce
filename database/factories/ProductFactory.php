<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $name = $this->faker->unique()->word();

        return [
            'name' => $name,
            'large_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'small_description' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'stock' => 0,
            'image' => 'sin_foto.png',
            'sell_price' => $this->faker->numberBetween($min = 17, $max = 40),
            'status' => 'ACTIVATE',
            'category_id' => Category::inRandomOrder()->first()->id,
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
        ];
    }
}
