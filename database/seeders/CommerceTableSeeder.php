<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commerce;

class CommerceTableSeeder extends Seeder
{
    public function run()
    {
        Commerce::create([
            'name'=> 'Geely - Store',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras commodo et mauris non sagittis. Aliquam ac lacus a augue efficitur volutpat ac ac massa. Vestibulum vel ipsum bibendum, pellentesque metus nec.',
            'logo'=> 'sinfoto.png',
            'email'=> 'geelystore@gmail.com',
            'address'=> 'Dirección #999',
            'phone'=> '+51 902118352',
        ]);
    }
}
