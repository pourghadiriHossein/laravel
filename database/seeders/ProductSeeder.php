<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            //MEN
            [
                'id' => 1,
                'discount_id' => null,
                'category_id' => 3,
                'label' => 'ژاکت مدل نیوجرسی',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 500000,
                'count' => 2,
            ],
            [
                'id' => 2,
                'discount_id' => 1,
                'category_id' => 3,
                'label' => 'ژاکت مردانه',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 750000,
                'count' => 2,
            ],
            [
                'id' => 3,
                'discount_id' => null,
                'category_id' => 3,
                'label' => 'هودی اسپرت',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 750000,
                'count' => 2,
            ],
            [
                'id' => 4,
                'discount_id' => null,
                'category_id' => 3,
                'label' => 'پیراهن لی اسپرت',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 500000,
                'count' => 2,
            ],
            [
                'id' => 5,
                'discount_id' => 3,
                'category_id' => 3,
                'label' => 'پیراهن سیاه اسپرت',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 750000,
                'count' => 2,
            ],
            [
                'id' => 6,
                'discount_id' => 3,
                'category_id' => 3,
                'label' => 'هودی صورمه ای',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 500000,
                'count' => 2,
            ],
            //WOMEN
            [
                'id' => 7,
                'discount_id' => 2,
                'category_id' => 4,
                'label' => 'دامن سفید',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 600000,
                'count' => 2,
            ],
            [
                'id' => 8,
                'discount_id' => 1,
                'category_id' => 4,
                'label' => 'دامن آر آر',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 600000,
                'count' => 2,
            ],
            [
                'id' => 9,
                'discount_id' => null,
                'category_id' => 4,
                'label' => 'شلوار لی زنانه',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 800000,
                'count' => 2,
            ],
            [
                'id' => 10,
                'discount_id' => null,
                'category_id' => 4,
                'label' => 'تاپ مجلس',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 600000,
                'count' => 2,
            ],
            [
                'id' => 11,
                'discount_id' => 1,
                'category_id' => 4,
                'label' => 'تاپ مشکی',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 800000,
                'count' => 2,
            ],
            [
                'id' => 12,
                'discount_id' => null,
                'category_id' => 4,
                'label' => 'لباس مجلسی',
                'description' => 'لباس مناسب با کیفیت عالی',
                'price' => 600000,
                'count' => 2,
            ],
            //WOMEN BAG
            [
                'id' => 13,
                'discount_id' => null,
                'category_id' => 5,
                'label' => 'کیف کروئلا',
                'description' => 'کیف مناسب با کیفیت عالی',
                'price' => 320000,
                'count' => 2,
            ],
            [
                'id' => 14,
                'discount_id' => 1,
                'category_id' => 5,
                'label' => 'کیف قرمز مخملی',
                'description' => 'کیف مناسب با کیفیت عالی',
                'price' => 350000,
                'count' => 2,
            ],
            [
                'id' => 15,
                'discount_id' => null,
                'category_id' => 5,
                'label' => 'کیف چرمی درجه یک',
                'description' => 'کیف مناسب با کیفیت عالی',
                'price' => 480000,
                'count' => 2,
            ],
        ];
        Product::insert($products);
        //All Product Image
        $productImages = [
            //MEN IMAGE
            [
                'product_id' => 1,
                'path' => 'public/assets/images/shop/jacket2-1-700x893.jpg'
            ],
            [
                'product_id' => 1,
                'path' => 'public/assets/images/shop/jacket2-2-700x893.jpg'
            ],
            [
                'product_id' => 2,
                'path' => 'public/assets/images/shop/jacket1-1-700x893.jpg'
            ],
            [
                'product_id' => 2,
                'path' => 'public/assets/images/shop/jacket1-2-700x893.jpg'
            ],
            [
                'product_id' => 3,
                'path' => 'public/assets/images/shop/hoodie1-1-700x893.jpg'
            ],
            [
                'product_id' => 3,
                'path' => 'public/assets/images/shop/hoodie1-2-700x893.jpg'
            ],
            [
                'product_id' => 4,
                'path' => 'public/assets/images/shop/shirt1-1-700x893.jpg'
            ],
            [
                'product_id' => 4,
                'path' => 'public/assets/images/shop/shirt1-2-700x893.jpg'
            ],
            [
                'product_id' => 5,
                'path' => 'public/assets/images/shop/shirt2-1-700x893.jpg'
            ],
            [
                'product_id' => 5,
                'path' => 'public/assets/images/shop/shirt2-2-700x893.jpg'
            ],
            [
                'product_id' => 6,
                'path' => 'public/assets/images/shop/hoodie2-1-700x893.jpg'
            ],
            [
                'product_id' => 6,
                'path' => 'public/assets/images/shop/hoodie2-2-700x893.jpg'
            ],
            //WOMEN IMAGE
            [
                'product_id' => 7,
                'path' => 'public/assets/images/shop/skirt1-1-700x893.jpg'
            ],
            [
                'product_id' => 7,
                'path' => 'public/assets/images/shop/skirt1-2-700x893.jpg'
            ],
            [
                'product_id' => 8,
                'path' => 'public/assets/images/shop/skirt4-1-700x893.jpg'
            ],
            [
                'product_id' => 8,
                'path' => 'public/assets/images/shop/skirt4-2-700x893.jpg'
            ],
            [
                'product_id' => 9,
                'path' => 'public/assets/images/shop/jeans1-1-700x893.jpg'
            ],
            [
                'product_id' => 9,
                'path' => 'public/assets/images/shop/jeans1-2-700x893.jpg'
            ],
            [
                'product_id' => 10,
                'path' => 'public/assets/images/shop/top1-1-700x893.jpg'
            ],
            [
                'product_id' => 10,
                'path' => 'public/assets/images/shop/top1-2-700x893.jpg'
            ],
            [
                'product_id' => 11,
                'path' => 'public/assets/images/shop/top2-1-700x893.jpg'
            ],
            [
                'product_id' => 11,
                'path' => 'public/assets/images/shop/top2-2-700x893.jpg'
            ],
            [
                'product_id' => 12,
                'path' => 'public/assets/images/shop/dress1-1-700x893.jpg'
            ],
            [
                'product_id' => 12,
                'path' => 'public/assets/images/shop/dress1-2-700x893.jpg'
            ],
            //BAG IMAGE
            [
                'product_id' => 13,
                'path' => 'public/assets/images/shop/bag1-1-700x893.jpg'
            ],
            [
                'product_id' => 13,
                'path' => 'public/assets/images/shop/bag1-2-700x893.jpg'
            ],
            [
                'product_id' => 14,
                'path' => 'public/assets/images/shop/bag3-1-700x893.jpg'
            ],
            [
                'product_id' => 14,
                'path' => 'public/assets/images/shop/bag3-2-700x893.jpg'
            ],
            [
                'product_id' => 15,
                'path' => 'public/assets/images/shop/bag4-1-700x893.jpg'
            ],
            [
                'product_id' => 15,
                'path' => 'public/assets/images/shop/bag4-2-700x893.jpg'
            ],
        ];
        ProductImage::insert($productImages);
        $productTags = [
            ['product_id' => 1 ,'tag_id'=> 1],
            ['product_id' => 1 ,'tag_id'=> 2],
            ['product_id' => 2 ,'tag_id'=> 3],
            ['product_id' => 3 ,'tag_id'=> 3],
            ['product_id' => 4 ,'tag_id'=> 4],
            ['product_id' => 4 ,'tag_id'=> 1],
            ['product_id' => 5 ,'tag_id'=> 4],
            ['product_id' => 5 ,'tag_id'=> 2],
            ['product_id' => 5 ,'tag_id'=> 3],
            ['product_id' => 6 ,'tag_id'=> 2],
            ['product_id' => 7 ,'tag_id'=> 2],
            ['product_id' => 8 ,'tag_id'=> 1],
            ['product_id' => 8 ,'tag_id'=> 4],
            ['product_id' => 9 ,'tag_id'=> 2],
            ['product_id' => 10 ,'tag_id'=> 3],
            ['product_id' => 10 ,'tag_id'=> 4],
            ['product_id' => 11 ,'tag_id'=> 2],
            ['product_id' => 12 ,'tag_id'=> 1],
            ['product_id' => 12 ,'tag_id'=> 3],
            ['product_id' => 13 ,'tag_id'=> 2],
            ['product_id' => 14 ,'tag_id'=> 2],
            ['product_id' => 15 ,'tag_id'=> 4],
        ];
        DB::table('product_tag')->insert($productTags);
    }
}
