# Create Migrations and Models

<ol>
    <li>Create All Object With Detail for Migration and Model
        <ul>
            <br><li>User
                <ul>
                    <br><li>id</li>
                    <br><li>name</li>
                    <br><li>password</li>
                    <br><li>email</li>
                    <br><li>phone</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Laravel Spatie Permission</li>
            <br><li>Contact
                <ul>
                    <br><li>id</li>
                    <br><li>user_id</li>
                    <br><li>name</li>
                    <br><li>phone</li>
                    <br><li>email</li>
                    <br><li>description</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Discount
                <ul>
                    <br><li>id</li>
                    <br><li>label</li>
                    <br><li>price</li>
                    <br><li>percent</li>
                    <br><li>gift_code</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Category
                <ul>
                    <br><li>id</li>
                    <br><li>parent_id</li>
                    <br><li>discount_id</li>
                    <br><li>label</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Tag
                <ul>
                    <br><li>id</li>
                    <br><li>label</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Product
                <ul>
                    <br><li>id</li>
                    <br><li>discount_id</li>
                    <br><li>category_id</li>
                    <br><li>label</li>
                    <br><li>description</li>
                    <br><li>price</li>
                    <br><li>count</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>ProductImage
                <ul>
                    <br><li>id</li>
                    <br><li>product_id</li>
                    <br><li>path</li>
                </ul>
            </li>
            <br><li>Comment
                <ul>
                    <br><li>id</li>
                    <br><li>user_id</li>
                    <br><li>product_id</li>
                    <br><li>description</li>
                    <br><li>status</li>
                    <br><li>state</li>
                </ul>
            </li>
            <br><li>Region
                <ul>
                    <br><li>id</li>
                    <br><li>label</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>City
                <ul>
                    <br><li>id</li>
                    <br><li>region_id</li>
                    <br><li>label</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Address
                <ul>
                    <br><li>id</li>
                    <br><li>city_id</li>
                    <br><li>user_id</li>
                    <br><li>detail</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Order
                <ul>
                    <br><li>id</li>
                    <br><li>user_id</li>
                    <br><li>address_id</li>
                    <br><li>discount_id</li>
                    <br><li>total_price</li>
                    <br><li>pay_price</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Transaction
                <ul>
                    <br><li>id</li>
                    <br><li>order_id</li>
                    <br><li>amount</li>
                    <br><li>status</li>
                    <br><li>IDPay_track_id</li>
                    <br><li>IDPay_id</li>
                    <br><li>card_no</li>
                    <br><li>pay_date</li>
                    <br><li>verify_date</li>
                </ul>
            </li>
            <br><li>OrderListItems
                <ul>
                    <br><li>id</li>
                    <br><li>product_id</li>
                    <br><li>order_id</li>
                    <br><li>price</li>
                    <br><li>pay_price</li>
                    <br><li>count</li>
                    <br><li>status</li>
                </ul>
            </li>
            <br><li>Pivot product_tag
                <ul>
                    <br><li>tag_id</li>
                    <br><li>product_id</li>
                </ul>
            </li>
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
    <li>Create Contact Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Discount Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Category Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Tag Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Product Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create ProductImage Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Comment Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Region Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create City Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Address Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Order Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create Transaction Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create OrderListItems Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>Create product_tag Model and Migration
        <ul>
            <br><li>Command For Create Migration: php artisan make:migration create_{Your Migration Name In Plural Form}_table</li>
            <br><li>Command For Create Model: php artisan make:model {Your Migration Name In Singular and capitalize Form}</li>
            <br><li>Command For Create Model and Migration in Same Time: php artisan make:model -m {Your Migration Name In Singular and capitalize Form}</li>
        </ul>
    </li><br>
    <li>php artisan migrate</li><br>
</ol>
