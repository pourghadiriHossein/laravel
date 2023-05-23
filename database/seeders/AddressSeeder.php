<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            [
                'city_id' => 339,
                'user_id' => 1,
                'detail' => 'رازی',
            ],
            [
                'city_id' => 339,
                'user_id' => 1,
                'detail' => 'گاز',
            ],
            [
                'city_id' => 339,
                'user_id' => 1,
                'detail' => 'یخسازی',
            ],
        ];
        Address::insert($addresses);
    }
}
