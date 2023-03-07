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
| int-pk  | str | decimal-20-2-NA | decimal-20-2-NA | str-NA | int |

- ### Tag
| id  | label | status |
| - | - | - |
| int-pk  | str-100 | int |

            
- ### Product
| id  | discount_id | category_id | label | description | price | count | status |
| - | - | - | - | - | - | - | - |
| int-pk  | int-fk-NA | int-fk | str-100 | str-10000 | decimal-20-2 | int-UNS | str |


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

```
- ### Update Contact Migration
```bash

```

## Create Discount Model and Migration
- ### Command For Create Discount Model and Migration
```bash

```
- ### Update Discount Migration
```bash

```

## Create Category Model and Migration
- ### Command For Create Category Model and Migration
```bash

```
- ### Update Category Migration
```bash

```

## Create Tag Model and Migration
- ### Command For Create Tag Model and Migration
```bash

```
- ### Tag Contact Migration
```bash

```

## Create Product Model and Migration
- ### Command For Create Product Model and Migration
```bash

```
- ### Update Product Migration
```bash

```

## Create ProductImage Model and Migration
- ### Command For Create ProductImage Model and Migration
```bash

```
- ### Update ProductImage Migration
```bash

```

## Create Comment Model and Migration
- ### Command For Create Comment Model and Migration
```bash

```
- ### Update Comment Migration
```bash

```

## Create Region Model and Migration
- ### Command For Create Region Model and Migration
```bash

```
- ### Update Region Migration
```bash

```

## Create City Model and Migration
- ### Command For Create City Model and Migration
```bash

```
- ### Update City Migration
```bash

```

## Create Address Model and Migration
- ### Command For Create Address Model and Migration
```bash

```
- ### Update Address Migration
```bash

```

## Create Order Model and Migration
- ### Command For Create Order Model and Migration
```bash

```
- ### Update Order Migration
```bash

```

## Create Transaction Model and Migration
- ### Command For Create Transaction Model and Migration
```bash

```
- ### Update Transaction Migration
```bash

```

## Create OrderListItems Model and Migration
- ### Command For Create OrderListItems Model and Migration
```bash

```
- ### Update OrderListItems Migration
```bash

```

## Create product_tag Model and Migration
- ### Command For Create product_tag Model and Migration
```bash

```
- ### Update product_tag Migration
```bash

```

## Submit Command In Laravel
```bash
php artisan migrate
```

