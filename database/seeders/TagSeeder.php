<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productTags = [
            ['label' => 'مجلسی'],
            ['label' => 'اسپرت'],
            ['label' => 'راحتی'],
            ['label' => 'مقاوم'],
        ];

        Tag::insert($productTags);
    }
}
