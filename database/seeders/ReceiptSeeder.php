<?php

namespace Database\Seeders;

use App\Models\Receipt;
use Illuminate\Database\Seeder;

class ReceiptSeeder extends Seeder
{
    public function run()
    {
        Receipt::factory(100)->create();
    }
}
