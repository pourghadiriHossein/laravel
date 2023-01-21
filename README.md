# Create Migrations and Models

<ol>
    <li>Create All Object With Detail for Migration and Model
        <ul>
            <br><li>User
                <ul>
                    <li>id</li>
                    <li>name</li>
                    <li>password</li>
                    <li>email</li>
                    <li>phone</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Laravel Spatie Permission</li>
            <br><li>Contact
                <ul>
                    <li>id</li>
                    <li>user_id</li>
                    <li>name</li>
                    <li>phone</li>
                    <li>email</li>
                    <li>description</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Discount
                <ul>
                    <li>id</li>
                    <li>label</li>
                    <li>price</li>
                    <li>percent</li>
                    <li>gift_code</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Category
                <ul>
                    <li>id</li>
                    <li>parent_id</li>
                    <li>discount_id</li>
                    <li>label</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Tag
                <ul>
                    <li>id</li>
                    <li>label</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Product
                <ul>
                    <li>id</li>
                    <li>discount_id</li>
                    <li>category_id</li>
                    <li>label</li>
                    <li>description</li>
                    <li>price</li>
                    <li>count</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>ProductImage
                <ul>
                    <li>id</li>
                    <li>product_id</li>
                    <li>path</li>
                </ul>
            </li>
            <br><li>Comment
                <ul>
                    <li>id</li>
                    <li>user_id</li>
                    <li>product_id</li>
                    <li>description</li>
                    <li>status</li>
                    <li>state</li>
                </ul>
            </li>
            <br><li>Region
                <ul>
                    <li>id</li>
                    <li>label</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>City
                <ul>
                    <li>id</li>
                    <li>region_id</li>
                    <li>label</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Address
                <ul>
                    <li>id</li>
                    <li>city_id</li>
                    <li>user_id</li>
                    <li>detail</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Order
                <ul>
                    <li>id</li>
                    <li>user_id</li>
                    <li>address_id</li>
                    <li>discount_id</li>
                    <li>total_price</li>
                    <li>pay_price</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Transaction
                <ul>
                    <li>id</li>
                    <li>order_id</li>
                    <li>amount</li>
                    <li>status</li>
                    <li>IDPay_track_id</li>
                    <li>IDPay_id</li>
                    <li>card_no</li>
                    <li>pay_date</li>
                    <li>verify_date</li>
                </ul>
            </li>
            <br><li>OrderListItems
                <ul>
                    <li>id</li>
                    <li>product_id</li>
                    <li>order_id</li>
                    <li>price</li>
                    <li>pay_price</li>
                    <li>count</li>
                    <li>status</li>
                </ul>
            </li>
            <br><li>Pivot product_tag
                <ul>
                    <li>tag_id</li>
                    <li>product_id</li>
                </ul>
            </li>
        </ul>
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
