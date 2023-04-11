# Create Migrations and Models  In Laravel

## Create All Object With Detail for Migration and Model

- ### User
| id  | name | password | email | phone | status |
| - | - | - | - | - | - |
| int-pk  | str-100 | str | str-UNI | str-14-UNI | int |

- ### Laravel Spatie Permission

- ### Contact
| id  | user_id | name | phone | email | description | status |
| - | - | - | - | - | - | - |
| int-pk  | int-fk-NA | str-100 | str-14 | str | str-10000 | int |

- ### Discount
| id  | label | price | percent | gift_code | status |
| - | - | - | - | - | - |
| int-pk  | str | decimal-20-2-NA | decimal-20-2-NA | str-NA | int |
            
- ### Category
| id  | parent_id | discount_id | label | status |
| - | - | - | - | - |
| int-pk | int-fk | int-fk | str | int |

- ### Tag
| id  | label | status |
| - | - | - |
| int-pk  | str-100 | int |

            
- ### Product
| id  | discount_id | category_id | label | description | price | count | status |
| - | - | - | - | - | - | - | - |
| int-pk  | int-fk-NA | int-fk | str-100 | str-10000 | decimal-20-2 | int-UNS | int |


- ### ProductImage
| id  | product_id | path |
| - | - | - |
| int-pk  | int-fk | str |


- ### Comment
| id  | user_id | product_id | description | status | state |
| - | - | - | - | - | - |
| int-pk  | int-fk | int-fk | str-10000 | int | bool |
            
            
            
- ### Region
| id  | label | status |
| - | - | - |
| int-pk  | str-100 | int |

- ### City
| id  | region_id | label | status |
| - | - | - | - |
| int-pk  | int-fk | str-100 | int |
            
            
- ### Address
| id  | city_id | user_id | detail | status |
| - | - | - | - | - |
| int-pk  | int-fk | int-fk | str-1000 | int |
           
            
- ### Order
| id  | user_id | address_id | discount_id | total_price | pay_price | status |
| - | - | - | - | - | - | - |
| int-pk  | int-fk | int-fk | int-fk-NA | decimal-20-2 | decimal-20-2 | int |

            
- ### Transaction
| id  | order_id | amount | status | IDPay_track_id | IDPay_id | card_no | pay_date | verify_date |
| - | - | - | - | - | - | - | - | - |
| int-pk  | int-fk | decimal-20-2 | int | int-UNS-B | str | str | str | str |


- ### OrderListItems
| id  | product_id | order_id | price | pay_price | count | status |
| - | - | - | - | - | - | - |
| int-pk  | int-fk | int-fk | decimal-20-2 | decimal-20-2 | int | int |            
            
- ### Pivot product_tag
| tag_id  | product_id |
| - | - |
| int-pk-fk  | int-pk-fk |


## How to Create Migration and Model in Terminal
- ### Command For Create Migration
```bash
php artisan make:migration create_{Your Migration Name In Plural Form}_table
```
- ### Command For Create Model
```bash
php artisan make:model {Your Migration Name In Singular and capitalize Form}
```
- ### Command For Create Model and Migration in Same Time
```bash
php artisan make:model -m {Your Migration Name In Singular and capitalize Form}
```

## Update User Migration
```bash
$table->id();
$table->string('name',100);
$table->string('password');
$table->string('email')->unique();
$table->string('phone',14)->unique();
$table->timestamp('email_verified_at')->nullable();
$table->unsignedTinyInteger('status')->default(0);
$table->rememberToken();
$table->timestamps();
$table->softDeletes();
```

## <a href="https://spatie.be/docs/laravel-permission/v5/installation-laravel">Install Spatie Laravel Permission</a>
- ### Install Spatie
```bash
composer require spatie/laravel-permission
```
- ### Add To providers Array in config\app.php File
```bash
Spatie\Permission\PermissionServiceProvider::class,
```
- ### Create Migartions
```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```
- ### Clear Config
```bash
php artisan config:clear
```
- ### Add to User Use
```bash
HasRoles
```

## Create Contact Model and Migration
- ### Command For Create Contact Model and Migration
```bash
php artisan make:model -m Contact
```
- ### Update Contact Migration
```bash
$table->id();
$table->unsignedBigInteger('user_id')->nullable();
$table->string('name',100);
$table->string('phone',14);
$table->string('email');
$table->string('description',10000);
$table->unsignedTinyInteger('status')->default(0);
$table->timestamps();

$table->foreign('user_id')
->references('id')
->on('users')
->onDelete('cascade')
->cascadeOnUpdate();
```

## Create Discount Model and Migration
- ### Command For Create Discount Model and Migration
```bash
php artisan make:model -m Discount
```
- ### Update Discount Migration
```bash
$table->id();
$table->string('label');
$table->decimal('price',20,2)->nullable();
$table->decimal('percent',20,2)->nullable();
$table->string('gift_code')->nullable();
$table->unsignedTinyInteger('status')->default(0);
$table->timestamps();
```

## Create Category Model and Migration
- ### Command For Create Category Model and Migration
```bash
php artisan make:model -m Category
```
- ### Update Category Migration
```bash
$table->id();
$table->unsignedBigInteger('parent_id')->nullable();
$table->unsignedBigInteger('discount_id')->nullable();
$table->string('label',100);
$table->unsignedTinyInteger('status')->default(1);
$table->timestamps();

$table->foreign('parent_id')
->references('id')
->on('categories')
->nullOnDelete()
->cascadeOnUpdate();

$table->foreign('discount_id')
->references('id')
->on('discounts')
->nullOnDelete()
->cascadeOnUpdate();
```

## Create Tag Model and Migration
- ### Command For Create Tag Model and Migration
```bash
php artisan make:model -m Tag
```
- ### Update Tag Migration
```bash
$table->id();
$table->string('label',100);
$table->unsignedTinyInteger('status')->default(1);
$table->timestamps();
```

## Create Product Model and Migration
- ### Command For Create Product Model and Migration
```bash
php artisan make:model -m Product
```
- ### Update Product Migration
```bash
$table->id();
$table->unsignedBigInteger('discount_id')->nullable();
$table->unsignedBigInteger('category_id');
$table->string('label',100);
$table->string('description',10000);
$table->decimal('price',20,2);
$table->integer('count')->unsigned()->default(0);
$table->unsignedTinyInteger('status')->default(1);
$table->timestamps();

$table->foreign('discount_id')
->references('id')
->on('discounts')
->nullOnDelete()
->cascadeOnUpdate();

$table->foreign('category_id')
->references('id')
->on('categories')
->cascadeOnDelete()
->cascadeOnUpdate();
```

## Create ProductImage Model and Migration
- ### Command For Create ProductImage Model and Migration
```bash
php artisan make:model -m ProductImage
```
- ### Update ProductImage Migration
```bash
$table->id();
$table->unsignedBigInteger('product_id');
$table->string('path');
$table->timestamps();

$table->foreign('product_id')
->references('id')
->on('products')
->onDelete('cascade')
->cascadeOnUpdate();
```

## Create Comment Model and Migration
- ### Command For Create Comment Model and Migration
```bash
php artisan make:model -m Comment
```
- ### Update Comment Migration
```bash
$table->id();
$table->unsignedBigInteger('user_id');
$table->unsignedBigInteger('product_id');
$table->string('description',10000);
$table->unsignedTinyInteger('status')->default(0);
$table->boolean('state')->default(0);
$table->timestamps();

$table->foreign('user_id')
->references('id')
->on('users')
->onDelete('cascade')
->cascadeOnUpdate();

$table->foreign('product_id')
->references('id')
->on('products')
->onDelete('cascade')
->cascadeOnUpdate();
```

## Create Region Model and Migration
- ### Command For Create Region Model and Migration
```bash
php artisan make:model -m Region
```
- ### Update Region Migration
```bash
$table->id();
$table->string('label',100);
$table->unsignedTinyInteger('status')->default(1);
$table->timestamps();
```

## Create City Model and Migration
- ### Command For Create City Model and Migration
```bash
php artisan make:model -m City
```
- ### Update City Migration
```bash
$table->id();
$table->unsignedBigInteger('region_id');
$table->string('label',100);
$table->unsignedTinyInteger('status')->default(1);
$table->timestamps();

$table->foreign('region_id')
->references('id')
->on('regions')
->onDelete('cascade')
->cascadeOnUpdate();
```

## Create Address Model and Migration
- ### Command For Create Address Model and Migration
```bash
php artisan make:model -m Address
```
- ### Update Address Migration
```bash
$table->id();
$table->unsignedBigInteger('city_id');
$table->unsignedBigInteger('user_id');
$table->string('detail',1000);
$table->unsignedTinyInteger('status')->default(1);
$table->timestamps();

$table->foreign('city_id')
->references('id')
->on('cities')
->onDelete('cascade')
->cascadeOnUpdate();

$table->foreign('user_id')
->references('id')
->on('users')
->onDelete('cascade')
->cascadeOnUpdate();
```

## Create Order Model and Migration
- ### Command For Create Order Model and Migration
```bash
php artisan make:model -m Order
```
- ### Update Order Migration
```bash
$table->id();
$table->unsignedBigInteger('user_id');
$table->unsignedBigInteger('address_id');
$table->unsignedBigInteger('discount_id')->nullable();
$table->decimal('total_price',20,2);
$table->decimal('pay_price',20,2);
$table->unsignedTinyInteger('status')->default(0);
$table->timestamps();

$table->foreign('user_id')
->references('id')
->on('users')
->cascadeOnDelete()
->cascadeOnUpdate();

$table->foreign('address_id')
->references('id')
->on('addresses')
->cascadeOnDelete()
->cascadeOnUpdate();

$table->foreign('discount_id')
->references('id')
->on('discounts')
->nullOnDelete()
->cascadeOnUpdate();
```

## Create Transaction Model and Migration
- ### Command For Create Transaction Model and Migration
```bash
php artisan make:model -m Transaction
```
- ### Update Transaction Migration
```bash
$table->id();
$table->unsignedBigInteger('order_id');
$table->decimal('amount',22,2);
$table->unsignedTinyInteger('status')->default(1);
$table->unsignedBigInteger('IDPay_track_id')->nullable();
$table->string('IDPay_id')->nullable();
$table->string('card_no')->nullable();
$table->string('pay_date')->nullable();
$table->string('verify_date')->nullable();
$table->timestamps();
$table->softDeletes();

$table->foreign('order_id')
->references('id')
->on('orders')
->onDelete('cascade')
->cascadeOnUpdate();
```

## Create OrderListItems Model and Migration
- ### Command For Create OrderListItems Model and Migration
```bash
php artisan make:model -m OrderListItems
```
- ### Update OrderListItems Migration
```bash
$table->id();
$table->unsignedBigInteger('product_id');
$table->unsignedBigInteger('order_id');
$table->decimal('price',20,2);
$table->decimal('pay_price',20,2);
$table->unsignedTinyInteger('count');
$table->unsignedTinyInteger('status')->default(0);
$table->timestamps();

$table->foreign('product_id')
->references('id')
->on('products')
->onDelete('cascade')
->cascadeOnUpdate();

$table->foreign('order_id')
->references('id')
->on('orders')
->onDelete('cascade')
->cascadeOnUpdate();
```

## Create product_tag Model and Migration
- ### Command For Create product_tag Model and Migration
```bash
php artisan make:migration create_product_tag_table
```
- ### Update product_tag Migration
```bash
$table->unsignedBigInteger('tag_id');
$table->unsignedBigInteger('product_id');

$table->foreign('tag_id')
    ->references('id')
    ->on('tags')
    ->cascadeOnDelete()
    ->cascadeOnUpdate();

$table->foreign('product_id')
    ->references('id')
    ->on('products')
    ->cascadeOnDelete()
    ->cascadeOnUpdate();

$table->primary(['tag_id','product_id']);
```

## Submit Command In Laravel
```bash
php artisan migrate
```

