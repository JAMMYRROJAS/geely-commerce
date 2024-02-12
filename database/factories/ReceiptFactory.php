<?php

namespace Database\Factories;

use App\Models\Receipt;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiptFactory extends Factory
{
    protected $model = Receipt::class;

    public function definition()
    {
        return [
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'receipt_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'total' => $this->faker->randomFloat(2, 10, 1000)
        ];
    }
}
