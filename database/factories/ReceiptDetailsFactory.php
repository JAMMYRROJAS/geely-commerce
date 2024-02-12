<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Receipt;
use App\Models\ReceiptDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiptDetailsFactory extends Factory
{
    protected $model = ReceiptDetails::class;

    public function definition()
    {
        return [
            'receipt_id' => Receipt::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(1, 1, 100)
        ];
    }
}
