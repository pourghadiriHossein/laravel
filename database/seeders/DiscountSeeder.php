<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discounts = [
            [
                'label' => 'تخفیف نقدی',
                'price' => '200000',
                'percent' => null,
                'gift_code' => null,
                'status' => 1
            ],
            [
                'label' => 'تخفیف درصدی',
                'price' => null,
                'percent' => '10',
                'gift_code' => null,
                'status' => 1
            ],
            [
                'label' => 'تخفیف توکنی',
                'price' => 50000,
                'percent' => null,
                'gift_code' => 'DISCOUNT',
                'status' => 1
            ],
        ];
        Discount::insert($discounts);
    }
}
