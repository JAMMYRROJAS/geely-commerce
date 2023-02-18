<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'adress' => $this->faker->address,
            'phone' => $this->faker->e164PhoneNumber,
            'dni' => $this->faker->e164PhoneNumber,
        ];
    }
}
