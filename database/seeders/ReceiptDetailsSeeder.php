<?php

namespace Database\Seeders;

use App\Models\ReceiptDetails;
use Illuminate\Database\Seeder;

class ReceiptDetailsSeeder extends Seeder
{
    public function run()
    {
        ReceiptDetails::factory(500)->create();
    }
}
