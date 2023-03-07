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

            
    </li><br>
    <li>How to Create Migration and Model in Terminal
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Update User Migration</li><br>
    <li><a href="https://spatie.be/docs/laravel-permission/v5/installation-laravel">Install Spatie Laravel Permission</a>
        <ul>
            <br><li>composer require spatie/laravel-permission</li>
            <br><li>In providers Array in config\app.php File, add Spatie\Permission\PermissionServiceProvider::class,</li>
            <br><li>php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"</li>
            <br><li>php artisan config:clear</li>
            <br><li>Add use HasRoles For User Model</li>
        </ul>
    </li><br>
    <li>Create Contact Model and Migration</li><br>
    <li>Create Discount Model and Migration</li><br>
    <li>Create Category Model and Migration</li><br>
    <li>Create Tag Model and Migration</li><br>
    <li>Create Product Model and Migration</li><br>
    <li>Create ProductImage Model and Migration</li><br>
    <li>Create Comment Model and Migration</li><br>
    <li>Create Region Model and Migration/li><br>
    <li>Create City Model and Migration</li><br>
    <li>Create Address Model and Migration/li><br>
    <li>Create Order Model and Migration</li><br>
    <li>Create Transaction Model and Migration/li><br>
    <li>Create OrderListItems Model and Migration</li><br>
    <li>Create product_tag Model and Migration</li><br>
    <li>php artisan migrate</li><br>
</ol>
