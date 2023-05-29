<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1,'parent_id' => null,'label' => 'مردانه'],
            ['id' => 2,'parent_id' => null,'label' => 'زنانه'],
            ['id' => 3,'parent_id' => 1,'label' => 'لباس'],
            ['id' => 4,'parent_id' => 2,'label' => 'لباس'],
            ['id' => 5,'parent_id' => 2,'label' => 'کیف'],
        ];

        Category::insert($categories);
    }
}
