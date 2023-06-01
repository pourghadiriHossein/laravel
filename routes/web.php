<?php

use App\Http\Controllers\PrivateController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

route::get('', [PublicController::class, 'index']);

Route::get('cart',[PublicController::class, 'cart'])->name('cart');

Route::get('checkout',[PublicController::class, 'checkout'])->name('checkout');

Route::get('contact',[PublicController::class, 'contact'])->name('contact');

Route::get('faq',[PublicController::class, 'faq'])->name('faq');

Route::get('home',[PublicController::class, 'home'])->name('home');

Route::get('login',[PublicController::class, 'login'])->name('login');
Route::post('login',[PublicController::class, 'postLogin'])->name('postLogin');
Route::get('logout',[PublicController::class, 'logout'])->name('logout');

Route::get('product',[PublicController::class, 'product'])->name('product');
Route::get('product/category/{category_id}',[PublicController::class, 'filterProductByCategory'])->name('filterProductByCategory');
Route::get('product/tag/{tag_id}',[PublicController::class, 'filterProductByTag'])->name('filterProductByTag');

Route::get('register',[PublicController::class, 'register'])->name('register');
Route::post('register',[PublicController::class, 'postRegister'])->name('postRegister');

Route::get('singleProduct/{product_id}',[PublicController::class, 'singleProduct'])->name('singleProduct');

Route::get('tac',[PublicController::class, 'tac'])->name('tac');

Route::post('add-comment/{product}',[PublicController::class, 'postNewComment'])->name('postNewComment');

// Private  Route
Route::prefix('private')->group(function () {

    Route::get('',[PrivateController::class, 'index']);
//User
    Route::get('visit-user',[PrivateController::class, 'visitUser'])->name('visitUser');
    Route::get('add-user',[PrivateController::class, 'addUser'])->name('addUser');
    Route::post('add-user',[PrivateController::class, 'postAddUser'])->name('postAddUser');
    Route::get('update-user/{user}',[PrivateController::class, 'updateUser'])->name('updateUser');
    Route::post('update-user/{user}',[PrivateController::class, 'postUpdateUser'])->name('postUpdateUser');
//role & permission
    Route::get('visit-permission',[PrivateController::class, 'visitPermission'])->name('visitPermission');
    Route::get('add-permission',[PrivateController::class, 'addPermission'])->name('addPermission');
    Route::post('add-permission',[PrivateController::class, 'postAddPermission'])->name('postAddPermission');
    Route::get('update-permission/{id}',[PrivateController::class, 'updatePermission'])->name('updatePermission');
    Route::post('update-permission/{id}',[PrivateController::class, 'postUpdatePermission'])->name('postUpdatePermission');
    Route::get('delete-permission/{id}',[PrivateController::class, 'deletePermission'])->name('deletePermission');
    Route::get('visit-role',[PrivateController::class, 'visitRole'])->name('visitRole');
    Route::get('add-role',[PrivateController::class, 'addRole'])->name('addRole');
    Route::post('add-role',[PrivateController::class, 'postAddRole'])->name('postAddRole');
    Route::get('update-role/{id}',[PrivateController::class, 'updateRole'])->name('updateRole');
    Route::post('update-role/{id}',[PrivateController::class, 'postUpdateRole'])->name('postUpdateRole');
    Route::get('delete-role/{id}',[PrivateController::class, 'deleteRole'])->name('deleteRole');
//category
    Route::get('visit-category',[PrivateController::class, 'visitCategory'])->name('visitCategory');
    Route::get('add-category',[PrivateController::class, 'addCategory'])->name('addCategory');
    Route::post('add-category',[PrivateController::class, 'postAddCategory'])->name('postAddCategory');
    Route::get('add-parent-category/{id}',[PrivateController::class, 'addParentCategory'])->name('addParentCategory');
    Route::post('add-parent-category/{id}',[PrivateController::class, 'postAddParentCategory'])->name('postAddParentCategory');
    Route::get('update-category/{id}',[PrivateController::class, 'updateCategory'])->name('updateCategory');
    Route::post('update-category/{id}', [PrivateController::class, 'postUpdateCategory'])->name('postUpdateCategory');
//tag
    Route::get('visit-tag',[PrivateController::class, 'visitTag'])->name('visitTag');
    Route::get('add-tag',[PrivateController::class, 'addTag'])->name('addTag');
    Route::post('add-tag', [PrivateController::class, 'postAddTag'])->name('postAddTag');
    Route::get('update-tag/{tag}',[PrivateController::class, 'updateTag'])->name('updateTag');
    Route::post('update-tag/{id}',[PrivateController::class, 'postUpdateTag'])->name('postUpdateTag');
//discount
    Route::get('visit-discount',[PrivateController::class, 'visitDiscount'])->name('visitDiscount');
    Route::get('add-discount',[PrivateController::class, 'addDiscount'])->name('addDiscount');
    Route::post('add-discount', [PrivateController::class, 'postAddDiscount'])->name('postAddDiscount');
    Route::get('update-discount/{discount}',[PrivateController::class, 'updateDiscount'])->name('updateDiscount');
    Route::post('update-discount/{id}', [PrivateController::class, 'postUpdateDiscount'])->name('postUpdateDiscount');
//product
    Route::get('visit-product', [PrivateController::class, 'visitProduct'])->name('visitProduct');
    Route::get('add-product', [PrivateController::class, 'addProduct'])->name('addProduct');
    Route::post('add-product',[PrivateController::class, 'postAddProduct'])->name('postAddProduct');
    Route::get('update-product/{product}', [PrivateController::class, 'updateProduct'])->name('updateProduct');
    Route::post('update-product/{id}',[PrivateController::class, 'postUpdateProduct'])->name('postUpdateProduct');
    Route::get('delete-product-image/{id}',[PrivateController::class, 'deleteProductImage'])->name('deleteProductImage');
//comment
    Route::get('visit-comment', [PrivateController::class, 'visitComment'])->name('visitComment');
    Route::get('update-comment/{comment}', [PrivateController::class, 'updateComment'])->name('updateComment');
    Route::post('update-comment/{id}',[PrivateController::class, 'postUpdateComment'])->name('postUpdateComment');
//region & city
    Route::get('visit-region',[PrivateController::class, 'visitRegion'])->name('visitRegion');
    Route::get('add-region',[PrivateController::class, 'addRegion'])->name('addRegion');
    Route::post('add-region',[PrivateController::class, 'postAddRegion'])->name('postAddRegion');
    Route::get('update-region/{region}',[PrivateController::class, 'updateRegion'])->name('updateRegion');
    Route::post('update-region/{id}',[PrivateController::class, 'postUpdateRegion'])->name('postUpdateRegion');
    Route::get('visit-city',[PrivateController::class, 'visitCity'])->name('visitCity');
    Route::get('add-city/{id}',[PrivateController::class, 'addCity'])->name('addCity');
    Route::post('add-city/{id}',[PrivateController::class,'postAddCity'])->name('postAddCity');
    Route::get('update-city/{city}',[PrivateController::class, 'updateCity'])->name('updateCity');
    Route::post('update-city/{id}',[PrivateController::class,'postUpdateCity'])->name('postUpdateCity');
//address
    Route::get('visit-address',[PrivateController::class, 'visitAddress'])->name('visitAddress');
    Route::get('delete-address/{address}',[PrivateController::class,'deleteAddress'])->name('deleteAddress');
//order
    Route::get('visit-order',[PrivateController::class, 'visitOrder'])->name('visitOrder');
//transaction
    Route::get('visit-transaction', [PrivateController::class, 'visitTransaction'])->name('visitTransaction');
//contact
    Route::get('visit-contact', [PrivateController::class, 'visitContact'])->name('visitContact');
    Route::get('visit-contact-detail/{contact}', [PrivateController::class, 'seeContactDetail'])->name('seeContactDetail');
});
