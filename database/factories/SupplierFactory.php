<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition()
    {
        $name = $this->faker->unique()->word();

        return [
            'name' => $name,
            'place_origin' => $this->faker->country,
        ];
    }
}
