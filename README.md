# Create Seeder For Add Data to Database

<ol>
<br><li>Create UserSeeder
<pre>
    Role::create([
        'name' => 'admin', 'guard_name' => 'web'
    ]);
    Role::create([
        'name' => 'user', 'guard_name' => 'web'
    ]);

    $user = User::create([
        'name' => 'حسین پورقدیری',
        'phone' => '09398932183',
        'email' => 'hossein.654321@yahoo.com',
        'status' => 1,
        'password' => Hash::make('123456')
    ]);
    $user->syncRoles(Role::findByName('admin'));
</pre>
</li>
<br><li>Create PermissionSeeder
<pre>
    $permission = [
        ['name' => 'free_access', 'guard_name' => 'web'],
        ['name' => 'limit_access', 'guard_name' => 'web']
    ];
    Permission::insert($permission);
</pre>
</li>
<br><li>Create DiscountSeeder
<pre>
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
</pre>
</li>
<br><li>Create CategorySeeder
<pre>
    $categories = [
        ['id' => 1,'parent_id' => null,'label' => 'مردانه'],
        ['id' => 2,'parent_id' => null,'label' => 'زنانه'],
        ['id' => 3,'parent_id' => 1,'label' => 'لباس'],
        ['id' => 4,'parent_id' => 2,'label' => 'لباس'],
        ['id' => 5,'parent_id' => 2,'label' => 'کیف'],
    ];

    Category::insert($categories);
</pre>
</li>
<br><li>Create TagSeeder
<pre>
    $productTags = [
        ['label' => 'مجلسی'],
        ['label' => 'اسپرت'],
        ['label' => 'راحتی'],
        ['label' => 'مقاوم'],
    ];

    Tag::insert($productTags);
</pre>
</li>
<br><li>Create ProductSeeder
<pre>
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
</pre>
</li>
<br><li>Create CommentSeeder
<pre>
    $comments = [
        [
            'user_id' => 1,
            'product_id' => 1,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 2,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 3,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 4,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 5,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 6,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 7,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 8,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 9,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 10,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 11,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 12,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 13,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 14,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
        [
            'user_id' => 1,
            'product_id' => 15,
            'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
        ],
    ];
    Comment::insert($comments);
</pre>
</li>
<br><li>Create RegionSeeder
<pre>
    $regions = [
        ['id' =>1, 'label' => 'آذربايجان شرقى'],
        ['id' =>2, 'label' => 'آذربایجان غربى'],
        ['id' =>3, 'label' => 'اردبيل'],
        ['id' =>4, 'label' => 'اصفهان'],
        ['id' =>5, 'label' => 'البرز'],
        ['id' =>6, 'label' => 'ايلام'],
        ['id' =>7, 'label' => 'بوشهر'],
        ['id' =>8, 'label' => 'تهران'],
        ['id' =>9, 'label' => 'چهارمحال و بختيارى'],
        ['id' =>10, 'label' => 'خراسان جنوبى'],
        ['id' =>11, 'label' => 'خراسان رضوى'],
        ['id' =>12, 'label' => 'خراسان شمالى'],
        ['id' =>13, 'label' => 'خوزستان'],
        ['id' =>14, 'label' => 'زنجان'],
        ['id' =>15, 'label' => 'سمنان'],
        ['id' =>16, 'label' => 'سيستان و بلوچستان'],
        ['id' =>17, 'label' => 'فارس'],
        ['id' =>18, 'label' => 'قزوين'],
        ['id' =>19, 'label' => 'قم'],
        ['id' =>20, 'label' => 'کردستان'],
        ['id' =>21, 'label' => 'کرمان'],
        ['id' =>22, 'label' => 'کرمانشاه'],
        ['id' =>23, 'label' => 'کهکيلويه و بويراحمد'],
        ['id' =>24, 'label' => 'گلستان'],
        ['id' =>25, 'label' => 'گيلان'],
        ['id' =>26, 'label' => 'لرستان'],
        ['id' =>27, 'label' => 'مازندران'],
        ['id' =>28, 'label' => 'مرکزى'],
        ['id' =>29, 'label' => 'هرمزگان'],
        ['id' =>30, 'label' => 'همدان'],
        ['id' =>31, 'label' => 'يزد']
    ];
    Region::insert($regions);

    $cities = [
        ['id' =>1, 'label' => 'اهر', 'region_id' => 1],
        ['id' =>2, 'label' => 'عجبشير', 'region_id' => 1],
        ['id' =>3, 'label' => 'آذر شهر', 'region_id' => 1],
        ['id' =>4, 'label' => 'بناب', 'region_id' => 1],
        ['id' =>5, 'label' => 'بستان آباد', 'region_id' => 1],
        ['id' =>6, 'label' => 'چاراويماق', 'region_id' => 1],
        ['id' =>7, 'label' => 'هشترود', 'region_id' => 1],
        ['id' =>8, 'label' => 'هريس', 'region_id' => 1],
        ['id' =>9, 'label' => 'جلفا', 'region_id' => 1],
        ['id' =>10, 'label' => 'كليبر', 'region_id' => 1],
        ['id' =>11, 'label' => 'خداآفرين', 'region_id' => 1],
        ['id' =>12, 'label' => 'ملكان', 'region_id' => 1],
        ['id' =>13, 'label' => 'مراغه', 'region_id' => 1],
        ['id' =>14, 'label' => 'ميانه', 'region_id' => 1],
        ['id' =>15, 'label' => 'مرند', 'region_id' => 1],
        ['id' =>16, 'label' => 'اسكو', 'region_id' => 1],
        ['id' =>17, 'label' => 'سراب', 'region_id' => 1],
        ['id' =>18, 'label' => 'شبستر', 'region_id' => 1],
        ['id' =>19, 'label' => 'تبريز', 'region_id' => 1],
        ['id' =>20, 'label' => 'ورزقان', 'region_id' => 1],
        ['id' =>21, 'label' => 'اروميه', 'region_id' => 2],
        ['id' =>22, 'label' => 'نقده', 'region_id' => 2],
        ['id' =>23, 'label' => 'ماكو', 'region_id' => 2],
        ['id' =>24, 'label' => 'تكاب', 'region_id' => 2],
        ['id' =>25, 'label' => 'خوى', 'region_id' => 2],
        ['id' =>26, 'label' => 'مهاباد', 'region_id' => 2],
        ['id' =>27, 'label' => 'سر دشت', 'region_id' => 2],
        ['id' =>28, 'label' => 'چالدران', 'region_id' => 2],
        ['id' =>29, 'label' => 'بوكان', 'region_id' => 2],
        ['id' =>30, 'label' => 'مياندوآب', 'region_id' => 2],
        ['id' =>31, 'label' => 'سلماس', 'region_id' => 2],
        ['id' =>32, 'label' => 'شاهين دژ', 'region_id' => 2],
        ['id' =>33, 'label' => 'پيرانشهر', 'region_id' => 2],
        ['id' =>34, 'label' => 'اشنويه', 'region_id' => 2],
        ['id' =>35, 'label' => 'چايپاره', 'region_id' => 2],
        ['id' =>36, 'label' => 'پلدشت', 'region_id' => 2],
        ['id' =>37, 'label' => 'شوط', 'region_id' => 2],
        ['id' =>38, 'label' => 'اردبيل', 'region_id' => 3],
        ['id' =>39, 'label' => 'سرعين', 'region_id' => 3],
        ['id' =>40, 'label' => 'بيله سوار', 'region_id' => 3],
        ['id' =>41, 'label' => 'پارس آباد', 'region_id' => 3],
        ['id' =>42, 'label' => 'خلخال', 'region_id' => 3],
        ['id' =>43, 'label' => 'مشگين شهر', 'region_id' => 3],
        ['id' =>44, 'label' => 'نمين', 'region_id' => 3],
        ['id' =>45, 'label' => 'نير', 'region_id' => 3],
        ['id' =>46, 'label' => 'كوثر', 'region_id' => 3],
        ['id' =>47, 'label' => 'گرمى', 'region_id' => 3],
        ['id' =>48, 'label' => 'بوئين و مياندشت', 'region_id' => 4],
        ['id' =>49, 'label' => 'مباركه', 'region_id' => 4],
        ['id' =>50, 'label' => 'اردستان', 'region_id' => 4],
        ['id' =>51, 'label' => 'خور و بيابانک', 'region_id' => 4],
        ['id' =>52, 'label' => 'فلاورجان', 'region_id' => 4],
        ['id' =>53, 'label' => 'فريدون شهر', 'region_id' => 4],
        ['id' =>54, 'label' => 'كاشان', 'region_id' => 4],
        ['id' =>55, 'label' => 'لنجان', 'region_id' => 4],
        ['id' =>56, 'label' => 'گلپايگان', 'region_id' => 4],
        ['id' =>57, 'label' => 'فريدن', 'region_id' => 4],
        ['id' =>58, 'label' => 'نايين', 'region_id' => 4],
        ['id' =>59, 'label' => 'اصفهان', 'region_id' => 4],
        ['id' =>60, 'label' => 'نجف آباد', 'region_id' => 4],
        ['id' =>61, 'label' => 'آران و بيدگل', 'region_id' => 4],
        ['id' =>62, 'label' => 'چادگان', 'region_id' => 4],
        ['id' =>63, 'label' => 'تيران و کرون', 'region_id' => 4],
        ['id' =>64, 'label' => 'شهرضا', 'region_id' => 4],
        ['id' =>65, 'label' => 'سميرم', 'region_id' => 4],
        ['id' =>66, 'label' => 'خمينى شهر', 'region_id' => 4],
        ['id' =>67, 'label' => 'دهاقان', 'region_id' => 4],
        ['id' =>68, 'label' => 'نطنز', 'region_id' => 4],
        ['id' =>69, 'label' => 'برخوار', 'region_id' => 4],
        ['id' =>70, 'label' => 'شاهين شهر و ميمه', 'region_id' => 4],
        ['id' =>71, 'label' => 'خوانسار', 'region_id' => 4],
        ['id' =>72, 'label' => 'ايلام', 'region_id' => 6],
        ['id' =>73, 'label' => 'مهران', 'region_id' => 6],
        ['id' =>74, 'label' => 'دهلران', 'region_id' => 6],
        ['id' =>75, 'label' => 'آبدانان', 'region_id' => 6],
        ['id' =>76, 'label' => 'چرداول', 'region_id' => 6],
        ['id' =>77, 'label' => 'دره شهر', 'region_id' => 6],
        ['id' =>78, 'label' => 'ايوان', 'region_id' => 6],
        ['id' =>79, 'label' => 'بدره', 'region_id' => 6],
        ['id' =>80, 'label' => 'سيروان', 'region_id' => 6],
        ['id' =>81, 'label' => 'ملکشاهى', 'region_id' => 6],
        ['id' =>82, 'label' => 'عسلويه', 'region_id' => 7],
        ['id' =>83, 'label' => 'گناوه', 'region_id' => 7],
        ['id' =>84, 'label' => 'دشتى', 'region_id' => 7],
        ['id' =>85, 'label' => 'دشتستان', 'region_id' => 7],
        ['id' =>86, 'label' => 'دير', 'region_id' => 7],
        ['id' =>87, 'label' => 'بوشهر', 'region_id' => 7],
        ['id' =>88, 'label' => 'كنگان', 'region_id' => 7],
        ['id' =>89, 'label' => 'تنگستان', 'region_id' => 7],
        ['id' =>90, 'label' => 'ديلم', 'region_id' => 7],
        ['id' =>91, 'label' => 'جم', 'region_id' => 7],
        ['id' =>92, 'label' => 'قرچك', 'region_id' => 8],
        ['id' =>93, 'label' => 'پرديس', 'region_id' => 8],
        ['id' =>94, 'label' => 'بهارستان', 'region_id' =>8],
        ['id' =>95, 'label' => 'شميرانات', 'region_id' =>8],
        ['id' =>96, 'label' => 'رباط كريم', 'region_id' =>8],
        ['id' =>97, 'label' => 'فيروزكوه', 'region_id' =>8],
        ['id' =>98, 'label' => 'تهران', 'region_id' =>8],
        ['id' =>99, 'label' => 'ورامين', 'region_id' =>8],
        ['id' =>100, 'label' => 'اسلامشهر', 'region_id' =>8],
        ['id' =>101, 'label' => 'رى', 'region_id' =>8],
        ['id' =>102, 'label' => 'پاكدشت', 'region_id' =>8],
        ['id' =>103, 'label' => 'پيشوا', 'region_id' =>8],
        ['id' =>104, 'label' => 'قدس', 'region_id' =>8],
        ['id' =>105, 'label' => 'ملارد', 'region_id' =>8],
        ['id' =>106, 'label' => 'شهريار', 'region_id' => 8],
        ['id' =>107, 'label' => 'دماوند', 'region_id' => 8],
        ['id' =>108, 'label' => 'بن', 'region_id' => 9],
        ['id' =>109, 'label' => 'سامان', 'region_id' => 9],
        ['id' =>110, 'label' => 'کيار', 'region_id' => 9],
        ['id' =>111, 'label' => 'بروجن', 'region_id' => 9],
        ['id' =>112, 'label' => 'اردل', 'region_id' => 9],
        ['id' =>113, 'label' => 'شهركرد', 'region_id' => 9],
        ['id' =>114, 'label' => 'فارسان', 'region_id' => 9],
        ['id' =>115, 'label' => 'کوهرنگ', 'region_id' => 9],
        ['id' =>116, 'label' => 'لردگان', 'region_id' => 9],
        ['id' =>117, 'label' => 'داورزن', 'region_id' => 11],
        ['id' =>118, 'label' => 'كلات', 'region_id' => 11],
        ['id' =>119, 'label' => 'بردسكن', 'region_id' => 11],
        ['id' =>120, 'label' => 'مشهد', 'region_id' => 11],
        ['id' =>121, 'label' => 'نيشابور', 'region_id' => 11],
        ['id' =>122, 'label' => 'سبزوار', 'region_id' => 11],
        ['id' =>123, 'label' => 'كاشمر', 'region_id' => 11],
        ['id' =>124, 'label' => 'گناباد', 'region_id' => 11],
        ['id' =>125, 'label' => 'تربت حيدريه', 'region_id' => 11],
        ['id' =>126, 'label' => 'خواف', 'region_id' => 11],
        ['id' =>127, 'label' => 'تربت جام', 'region_id' => 11],
        ['id' =>128, 'label' => 'تايباد', 'region_id' => 11],
        ['id' =>129, 'label' => 'مه ولات', 'region_id' => 11],
        ['id' =>130, 'label' => 'چناران', 'region_id' => 11],
        ['id' =>131, 'label' => 'درگز', 'region_id' => 11],
        ['id' =>132, 'label' => 'فيروزه', 'region_id' => 11],
        ['id' =>133, 'label' => 'قوچان', 'region_id' => 11],
        ['id' =>134, 'label' => 'سرخس', 'region_id' => 11],
        ['id' =>135, 'label' => 'رشتخوار', 'region_id' => 11],
        ['id' =>136, 'label' => 'بينالود', 'region_id' => 11],
        ['id' =>137, 'label' => 'زاوه', 'region_id' => 11],
        ['id' =>138, 'label' => 'جوين', 'region_id' => 11],
        ['id' =>139, 'label' => 'بجستان', 'region_id' => 11],
        ['id' =>140, 'label' => 'باخزر', 'region_id' => 11],
        ['id' =>141, 'label' => 'فريمان', 'region_id' => 11],
        ['id' =>142, 'label' => 'خليل آباد', 'region_id' => 11],
        ['id' =>143, 'label' => 'جغتاى', 'region_id' => 11],
        ['id' =>144, 'label' => 'خوشاب', 'region_id' => 11],
        ['id' =>145, 'label' => 'زيرکوه', 'region_id' => 10],
        ['id' =>146, 'label' => 'خوسف', 'region_id' => 10],
        ['id' =>147, 'label' => 'درميان', 'region_id' => 10],
        ['id' =>148, 'label' => 'قائنات', 'region_id' => 10],
        ['id' =>149, 'label' => 'بشرويه', 'region_id' => 10],
        ['id' =>150, 'label' => 'فردوس', 'region_id' => 10],
        ['id' =>151, 'label' => 'بيرجند', 'region_id' => 10],
        ['id' =>152, 'label' => 'نهبندان', 'region_id' => 10],
        ['id' =>153, 'label' => 'سربيشه', 'region_id' => 10],
        ['id' =>154, 'label' => 'سرايان', 'region_id' => 10],
        ['id' =>155, 'label' => 'طبس', 'region_id' => 11],
        ['id' =>156, 'label' => 'بجنورد', 'region_id' => 12],
        ['id' =>157, 'label' => 'راز و جرگلان', 'region_id' => 12],
        ['id' =>158, 'label' => 'اسفراين', 'region_id' => 12],
        ['id' =>159, 'label' => 'جاجرم', 'region_id' => 12],
        ['id' =>160, 'label' => 'شيروان', 'region_id' => 12],
        ['id' =>161, 'label' => 'مانه و سملقان', 'region_id' => 12],
        ['id' =>162, 'label' => 'گرمه', 'region_id' => 12],
        ['id' =>163, 'label' => 'فاروج', 'region_id' => 12],
        ['id' =>164, 'label' => 'کارون', 'region_id' => 13],
        ['id' =>165, 'label' => 'حميديه', 'region_id' => 13],
        ['id' =>166, 'label' => 'آغاجرى', 'region_id' => 13],
        ['id' =>167, 'label' => 'شوشتر', 'region_id' => 13],
        ['id' =>168, 'label' => 'دشت آزادگان', 'region_id' => 13],
        ['id' =>169, 'label' => 'اميديه', 'region_id' => 13],
        ['id' =>170, 'label' => 'گتوند', 'region_id' => 13],
        ['id' =>171, 'label' => 'شادگان', 'region_id' => 13],
        ['id' =>172, 'label' => 'دزفول', 'region_id' => 13],
        ['id' =>173, 'label' => 'رامشير', 'region_id' => 13],
        ['id' =>174, 'label' => 'بهبهان', 'region_id' => 13],
        ['id' =>175, 'label' => 'باوى', 'region_id' => 13],
        ['id' =>176, 'label' => 'انديمشك', 'region_id' => 13],
        ['id' =>177, 'label' => 'اهواز', 'region_id' => 13],
        ['id' =>178, 'label' => 'انديکا', 'region_id' => 13],
        ['id' =>179, 'label' => 'شوش', 'region_id' => 13],
        ['id' =>180, 'label' => 'آبادان', 'region_id' => 13],
        ['id' =>181, 'label' => 'هنديجان', 'region_id' => 13],
        ['id' =>182, 'label' => 'خرمشهر', 'region_id' => 13],
        ['id' =>183, 'label' => 'مسجد سليمان', 'region_id' => 13],
        ['id' =>184, 'label' => 'ايذه', 'region_id' => 13],
        ['id' =>185, 'label' => 'رامهرمز', 'region_id' => 13],
        ['id' =>186, 'label' => 'باغ ملك', 'region_id' => 13],
        ['id' =>187, 'label' => 'هفتکل', 'region_id' => 13],
        ['id' =>188, 'label' => 'هويزه', 'region_id' => 13],
        ['id' =>189, 'label' => 'ماهشهر', 'region_id' => 13],
        ['id' =>190, 'label' => 'لالى', 'region_id' => 13],
        ['id' =>191, 'label' => 'زنجان', 'region_id' => 14],
        ['id' =>192, 'label' => 'ابهر', 'region_id' => 14],
        ['id' =>193, 'label' => 'خدابنده', 'region_id' => 14],
        ['id' =>194, 'label' => 'ماهنشان', 'region_id' => 14],
        ['id' =>195, 'label' => 'خرمدره', 'region_id' => 14],
        ['id' =>196, 'label' => 'ايجرود', 'region_id' => 14],
        ['id' =>197, 'label' => 'طارم', 'region_id' => 14],
        ['id' =>198, 'label' => 'سلطانيه', 'region_id' => 14],
        ['id' =>199, 'label' => 'سمنان', 'region_id' => 15],
        ['id' =>200, 'label' => 'شاهرود', 'region_id' => 15],
        ['id' =>201, 'label' => 'گرمسار', 'region_id' => 15],
        ['id' =>202, 'label' => 'سرخه', 'region_id' => 15],
        ['id' =>203, 'label' => 'دامغان', 'region_id' => 15],
        ['id' =>204, 'label' => 'آرادان', 'region_id' => 15],
        ['id' =>205, 'label' => 'مهدى شهر', 'region_id' => 15],
        ['id' =>206, 'label' => 'ميامى', 'region_id' => 15],
        ['id' =>207, 'label' => 'زاهدان', 'region_id' => 16],
        ['id' =>208, 'label' => 'بمپور', 'region_id' => 16],
        ['id' =>209, 'label' => 'چابهار', 'region_id' => 16],
        ['id' =>210, 'label' => 'خاش', 'region_id' => 16],
        ['id' =>211, 'label' => 'سراوان', 'region_id' => 16],
        ['id' =>212, 'label' => 'زابل', 'region_id' => 16],
        ['id' =>213, 'label' => 'سرباز', 'region_id' => 16],
        ['id' =>214, 'label' => 'قصر قند', 'region_id' => 16],
        ['id' =>215, 'label' => 'نيكشهر', 'region_id' => 16],
        ['id' =>216, 'label' => 'کنارک', 'region_id' => 16],
        ['id' =>217, 'label' => 'ايرانشهر', 'region_id' => 16],
        ['id' =>218, 'label' => 'زهک', 'region_id' => 16],
        ['id' =>219, 'label' => 'سيب و سوران', 'region_id' => 16],
        ['id' =>220, 'label' => 'ميرجاوه', 'region_id' => 16],
        ['id' =>221, 'label' => 'دلگان', 'region_id' => 16],
        ['id' =>222, 'label' => 'هيرمند', 'region_id' => 16],
        ['id' =>223, 'label' => 'مهرستان', 'region_id' => 16],
        ['id' =>224, 'label' => 'فنوج', 'region_id' => 16],
        ['id' =>225, 'label' => 'هامون', 'region_id' => 16],
        ['id' =>226, 'label' => 'نيمروز', 'region_id' => 16],
        ['id' =>227, 'label' => 'شيراز', 'region_id' => 17],
        ['id' =>228, 'label' => 'اقليد', 'region_id' => 17],
        ['id' =>229, 'label' => 'داراب', 'region_id' => 17],
        ['id' =>230, 'label' => 'فسا', 'region_id' => 17],
        ['id' =>231, 'label' => 'مرودشت', 'region_id' => 17],
        ['id' =>232, 'label' => 'خرم بيد', 'region_id' => 17],
        ['id' =>233, 'label' => 'آباده', 'region_id' => 17],
        ['id' =>234, 'label' => 'كازرون', 'region_id' => 17],
        ['id' =>235, 'label' => 'گراش', 'region_id' => 17],
        ['id' =>236, 'label' => 'ممسنى', 'region_id' => 17],
        ['id' =>237, 'label' => 'سپيدان', 'region_id' => 17],
        ['id' =>238, 'label' => 'لارستان', 'region_id' => 17],
        ['id' =>239, 'label' => 'فيروز آباد', 'region_id' => 17],
        ['id' =>240, 'label' => 'جهرم', 'region_id' => 17],
        ['id' =>241, 'label' => 'ني ريز', 'region_id' => 17],
        ['id' =>242, 'label' => 'استهبان', 'region_id' => 17],
        ['id' =>243, 'label' => 'لامرد', 'region_id' => 17],
        ['id' =>244, 'label' => 'مهر', 'region_id' => 17],
        ['id' =>245, 'label' => 'پاسارگاد', 'region_id' => 17],
        ['id' =>246, 'label' => 'ارسنجان', 'region_id' => 17],
        ['id' =>247, 'label' => 'قيروكارزين', 'region_id' => 17],
        ['id' =>248, 'label' => 'رستم', 'region_id' => 17],
        ['id' =>249, 'label' => 'فراشبند', 'region_id' => 17],
        ['id' =>250, 'label' => 'سروستان', 'region_id' => 17],
        ['id' =>251, 'label' => 'زرين دشت', 'region_id' => 17],
        ['id' =>252, 'label' => 'کوار', 'region_id' => 17],
        ['id' =>253, 'label' => 'بوانات', 'region_id' => 17],
        ['id' =>254, 'label' => 'خرامه', 'region_id' => 17],
        ['id' =>255, 'label' => 'خنج', 'region_id' => 17],
        ['id' =>256, 'label' => 'قزوين', 'region_id' => 18],
        ['id' =>257, 'label' => 'تاكستان', 'region_id' => 18],
        ['id' =>258, 'label' => 'آبيك', 'region_id' => 18],
        ['id' =>259, 'label' => 'بوئين زهرا', 'region_id' => 18],
        ['id' =>260, 'label' => 'البرز', 'region_id' => 18],
        ['id' =>261, 'label' => 'آوج', 'region_id' => 18],
        ['id' =>262, 'label' => 'قم', 'region_id' => 19],
        ['id' =>263, 'label' => 'طالقان', 'region_id' => 5],
        ['id' =>264, 'label' => 'اشتهارد', 'region_id' => 5],
        ['id' =>265, 'label' => 'كرج', 'region_id' => 5],
        ['id' =>266, 'label' => 'نظر آباد', 'region_id' => 5],
        ['id' =>267, 'label' => 'ساوجبلاغ‎', 'region_id' => 5],
        ['id' =>268, 'label' => 'فرديس', 'region_id' => 5],
        ['id' =>269, 'label' => 'سنندج', 'region_id' => 20],
        ['id' =>270, 'label' => 'ديواندره', 'region_id' => 20],
        ['id' =>271, 'label' => 'بانه', 'region_id' => 20],
        ['id' =>272, 'label' => 'بيجار', 'region_id' => 20],
        ['id' =>273, 'label' => 'سقز', 'region_id' => 20],
        ['id' =>274, 'label' => 'كامياران', 'region_id' => 20],
        ['id' =>275, 'label' => 'قروه', 'region_id' => 20],
        ['id' =>276, 'label' => 'مريوان', 'region_id' => 20],
        ['id' =>277, 'label' => 'سروآباد‎', 'region_id' => 20],
        ['id' =>278, 'label' => 'دهگلان‎', 'region_id' => 20],
        ['id' =>279, 'label' => 'كرمان','region_id' => 21],
        ['id' =>280, 'label' => 'راور', 'region_id' => 21],
        ['id' =>281, 'label' => 'شهر بابک', 'region_id' => 21],
        ['id' =>282, 'label' => 'انار', 'region_id' => 21],
        ['id' =>283, 'label' => 'کوهبنان', 'region_id' => 21],
        ['id' =>284, 'label' => 'رفسنجان', 'region_id' => 21],
        ['id' =>285, 'label' => 'سيرجان', 'region_id' => 21],
        ['id' =>286, 'label' => 'كهنوج', 'region_id' => 21],
        ['id' =>287, 'label' => 'زرند', 'region_id' => 21],
        ['id' =>288, 'label' => 'ريگان', 'region_id' => 21],
        ['id' =>289, 'label' => 'بم', 'region_id' => 21],
        ['id' =>290, 'label' => 'جيرفت', 'region_id' => 21],
        ['id' =>291, 'label' => 'عنبرآباد', 'region_id' => 21],
        ['id' =>292, 'label' => 'بافت', 'region_id' => 21],
        ['id' =>293, 'label' => 'ارزوئيه', 'region_id' => 21],
        ['id' =>294, 'label' => 'بردسير', 'region_id' => 21],
        ['id' =>295, 'label' => 'فهرج', 'region_id' => 21],
        ['id' =>296, 'label' => 'فارياب', 'region_id' => 21],
        ['id' =>297, 'label' => 'منوجان', 'region_id' => 21],
        ['id' =>298, 'label' => 'نرماشير', 'region_id' => 21],
        ['id' =>299, 'label' => 'قلعه گنج', 'region_id' => 21],
        ['id' =>300, 'label' => 'رابر', 'region_id' => 21],
        ['id' =>301, 'label' => 'رودبار جنوب', 'region_id' => 21],
        ['id' =>302, 'label' => 'كرمانشاه', 'region_id' => 22],
        ['id' =>303, 'label' => 'اسلام آباد غرب', 'region_id' => 22],
        ['id' =>304, 'label' => 'سر پل ذهاب', 'region_id' => 22],
        ['id' =>305, 'label' => 'كنگاور', 'region_id' => 22],
        ['id' =>306, 'label' => 'سنقر', 'region_id' => 22],
        ['id' =>307, 'label' => 'قصر شيرين', 'region_id' => 22],
        ['id' =>308, 'label' => 'گيلان غرب', 'region_id' => 22],
        ['id' =>309, 'label' => 'هرسين', 'region_id' => 22],
        ['id' =>310, 'label' => 'صحنه', 'region_id' => 22],
        ['id' =>311, 'label' => 'پاوه', 'region_id' => 22],
        ['id' =>312, 'label' => 'جوانرود', 'region_id' => 22],
        ['id' =>313, 'label' => 'دالاهو', 'region_id' => 22],
        ['id' =>314, 'label' => 'روانسر', 'region_id' => 22],
        ['id' =>315, 'label' => 'ثلاث باباجانى', 'region_id' => 22],
        ['id' =>316, 'label' => 'ياسوج', 'region_id' => 23],
        ['id' =>317, 'label' => 'گچساران', 'region_id' => 23],
        ['id' =>318, 'label' => 'دنا', 'region_id' => 23],
        ['id' =>319, 'label' => 'کهگيلويه‎', 'region_id' => 23],
        ['id' =>320, 'label' => 'لنده', 'region_id' => 23],
        ['id' =>321, 'label' => 'بهمئى', 'region_id' => 23],
        ['id' =>322, 'label' => 'باشت', 'region_id' => 23],
        ['id' =>323, 'label' => 'بويراحمد', 'region_id' => 23],
        ['id' =>324, 'label' => 'چرام', 'region_id' => 23],
        ['id' =>325, 'label' => 'گرگان', 'region_id' => 24],
        ['id' =>326, 'label' => 'آق قلا', 'region_id' => 24],
        ['id' =>327, 'label' => 'گنبد كاووس', 'region_id' => 24],
        ['id' =>328, 'label' => 'على آباد', 'region_id' => 24],
        ['id' =>329, 'label' => 'مينو دشت', 'region_id' => 24],
        ['id' =>330, 'label' => 'تركمن', 'region_id' => 24],
        ['id' =>331, 'label' => 'كردكوى', 'region_id' => 24],
        ['id' =>332, 'label' => 'بندر گز', 'region_id' => 24],
        ['id' =>333, 'label' => 'كلاله', 'region_id' => 24],
        ['id' =>334, 'label' => 'آزاد شهر', 'region_id' => 24],
        ['id' =>335, 'label' => 'راميان', 'region_id' => 24],
        ['id' =>336, 'label' => 'گاليکش‎', 'region_id' => 24],
        ['id' =>337, 'label' => 'مراوه تپه', 'region_id' => 24],
        ['id' =>338, 'label' => 'گميشان', 'region_id' => 24],
        ['id' =>339, 'label' => 'رشت', 'region_id' => 25],
        ['id' =>340, 'label' => 'لنگرود', 'region_id' => 25],
        ['id' =>341, 'label' => 'رودسر', 'region_id' => 25],
        ['id' =>342, 'label' => 'تالش', 'region_id' => 25],
        ['id' =>343, 'label' => 'آستارا', 'region_id' => 25],
        ['id' =>344, 'label' => 'آستانه اشرفيه', 'region_id' => 25],
        ['id' =>345, 'label' => 'رودبار', 'region_id' => 25],
        ['id' =>346, 'label' => 'فومن', 'region_id' => 25],
        ['id' =>347, 'label' => 'صومعه سرا', 'region_id' => 25],
        ['id' =>348, 'label' => 'بندرانزلى', 'region_id' => 25],
        ['id' =>349, 'label' => 'رضوانشهر', 'region_id' => 25],
        ['id' =>350, 'label' => 'ماسال', 'region_id' => 25],
        ['id' =>351, 'label' => 'شفت', 'region_id' => 25],
        ['id' =>352, 'label' => 'سياهكل', 'region_id' => 25],
        ['id' =>353, 'label' => 'املش', 'region_id' => 25],
        ['id' =>354, 'label' => 'لاهيجان', 'region_id' => 25],
        ['id' =>355, 'label' => 'خرم آباد', 'region_id' => 26],
        ['id' =>356, 'label' => 'دلفان', 'region_id' => 26],
        ['id' =>357, 'label' => 'بروجرد', 'region_id' => 26],
        ['id' =>358, 'label' => 'دورود', 'region_id' => 26],
        ['id' =>359, 'label' => 'اليگودرز', 'region_id' => 26],
        ['id' =>360, 'label' => 'ازنا', 'region_id' => 26],
        ['id' =>361, 'label' => 'كوهدشت', 'region_id' => 26],
        ['id' =>362, 'label' => 'سلسله', 'region_id' => 26],
        ['id' =>363, 'label' => 'پلدختر', 'region_id' => 26],
        ['id' =>364, 'label' => 'دوره', 'region_id' => 26],
        ['id' =>365, 'label' => 'رومشکان', 'region_id' => 26],
        ['id' =>366, 'label' => 'سارى', 'region_id' => 27],
        ['id' =>367, 'label' => 'آمل', 'region_id' => 27],
        ['id' =>368, 'label' => 'بابل', 'region_id' => 27],
        ['id' =>369, 'label' => 'بابلسر', 'region_id' => 27],
        ['id' =>370, 'label' => 'بهشهر', 'region_id' => 27],
        ['id' =>371, 'label' => 'تنكابن', 'region_id' => 27],
        ['id' =>372, 'label' => 'جويبار', 'region_id' => 27],
        ['id' =>373, 'label' => 'چالوس', 'region_id' => 27],
        ['id' =>374, 'label' => 'رامسر', 'region_id' => 27],
        ['id' =>375, 'label' => 'سواد كوه', 'region_id' => 27],
        ['id' =>376, 'label' => 'قائم شهر', 'region_id' => 27],
        ['id' =>377, 'label' => 'نكا', 'region_id' => 27],
        ['id' =>378, 'label' => 'نور', 'region_id' => 27],
        ['id' =>379, 'label' => 'نوشهر', 'region_id' => 27],
        ['id' =>380, 'label' => 'محمودآباد', 'region_id' => 27],
        ['id' =>381, 'label' => 'فريدونکنار', 'region_id' => 27],
        ['id' =>382, 'label' => 'عباس آباد', 'region_id' => 27],
        ['id' =>383, 'label' => 'گلوگاه', 'region_id' => 27],
        ['id' =>384, 'label' => 'مياندورود', 'region_id' => 27],
        ['id' =>385, 'label' => 'سيمرغ', 'region_id' => 27],
        ['id' =>386, 'label' => 'کلاردشت', 'region_id' => 27],
        ['id' =>387, 'label' => 'سوادکوه شمالى', 'region_id' => 27],
        ['id' =>388, 'label' => 'اراك', 'region_id' => 28],
        ['id' =>389, 'label' => 'آشتيان', 'region_id' => 28],
        ['id' =>390, 'label' => 'تفرش', 'region_id' => 28],
        ['id' =>391, 'label' => 'خمين', 'region_id' => 28],
        ['id' =>392, 'label' => 'دليجان', 'region_id' => 28],
        ['id' =>393, 'label' => 'ساوه', 'region_id' => 28],
        ['id' =>394, 'label' => 'زرنديه', 'region_id' => 28],
        ['id' =>395, 'label' => 'محلات', 'region_id' => 28],
        ['id' =>396, 'label' => 'شازند', 'region_id' => 28],
        ['id' =>397, 'label' => 'فراهان', 'region_id' => 28],
        ['id' =>398, 'label' => 'خنداب', 'region_id' => 28],
        ['id' =>399, 'label' => 'کميجان', 'region_id' => 28],
        ['id' =>400, 'label' => 'بندرعباس', 'region_id' => 29],
        ['id' =>401, 'label' => 'قشم', 'region_id' => 29],
        ['id' =>402, 'label' => 'بندر لنگه', 'region_id' => 29],
        ['id' =>403, 'label' => 'بستك', 'region_id' => 29],
        ['id' =>404, 'label' => 'حاجى آباد هرمزگان', 'region_id' => 29],
        ['id' =>405, 'label' => 'رودان', 'region_id' => 29],
        ['id' =>406, 'label' => 'ميناب', 'region_id' => 29],
        ['id' =>407, 'label' => 'ابوموسى', 'region_id' => 29],
        ['id' =>408, 'label' => 'جاسک', 'region_id' => 29],
        ['id' =>409, 'label' => 'خمير', 'region_id' => 29],
        ['id' =>410, 'label' => 'پارسيان', 'region_id' => 29],
        ['id' =>411, 'label' => 'بشاگرد', 'region_id' => 29],
        ['id' =>412, 'label' => 'سيريک', 'region_id' => 29],
        ['id' =>413, 'label' => 'حاجي آباد', 'region_id' => 29],
        ['id' =>414, 'label' => 'همدان', 'region_id' => 30],
        ['id' =>415, 'label' => 'ملاير', 'region_id' => 30],
        ['id' =>416, 'label' => 'تويسركان', 'region_id' => 30],
        ['id' =>417, 'label' => 'نهاوند', 'region_id' => 30],
        ['id' =>418, 'label' => 'كبودر اهنگ', 'region_id' => 30],
        ['id' =>419, 'label' => 'رزن', 'region_id' => 30],
        ['id' =>420, 'label' => 'اسدآباد', 'region_id' => 30],
        ['id' =>421, 'label' => 'بهار', 'region_id' => 30],
        ['id' =>422, 'label' => 'فامنين', 'region_id' => 30],
        ['id' =>423, 'label' => 'يزد', 'region_id' => 31],
        ['id' =>424, 'label' => 'تفت', 'region_id' => 31],
        ['id' =>425, 'label' => 'اردكان', 'region_id' => 31],
        ['id' =>426, 'label' => 'ابركوه', 'region_id' => 31],
        ['id' =>427, 'label' => 'ميبد', 'region_id' => 31],
        ['id' =>428, 'label' => 'بافق', 'region_id' => 31],
        ['id' =>429, 'label' => 'صدوق', 'region_id' => 31],
        ['id' =>430, 'label' => 'مهريز', 'region_id' => 31],
        ['id' =>431, 'label' => 'خاتم', 'region_id' => 31],
        ['id' =>432, 'label' => 'کلاچای', 'region_id' => 25],
        ['id' =>433, 'label' => 'هشتپر', 'region_id' => 25],
    ];
    City::insert($cities);
</pre>
</li>
<br><li>Create AddressSeeder
<pre>
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
</pre>
</li>
<br><li>Create ContactSeeder
<pre>
    $contacts = [
        [
            'user_id' => null,
            'name' => 'علی ابراهیمی',
            'phone' => '093355587960',
            'email' => 'test1@test.com',
            'description' => 'تماس با ما آزمایشی',
        ],
        [
            'user_id' => 1,
            'name' => 'حسین پورقدیری',
            'phone' => '093355587960',
            'email' => 'test1@test.com',
            'description' => 'تماس با ما آزمایشی',
        ],
        [
            'user_id' => null,
            'name' => 'سهیل ابراهیمی',
            'phone' => '093355587960',
            'email' => 'test1@test.com',
            'description' => 'تماس با ما آزمایشی',
        ],
    ];
    Contact::insert($contacts);
</pre>
</li>
</ol>


