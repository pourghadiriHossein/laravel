<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

route::get('', [PublicController::class, 'index']);

Route::get('cart',[PublicController::class, 'cart'])->name('cart');

Route::get('checkout',[PublicController::class, 'checkout'])->name('checkout');

Route::get('contact',[PublicController::class, 'contact'])->name('contact');

Route::get('faq',[PublicController::class, 'faq'])->name('faq');

Route::get('home',[PublicController::class, 'home'])->name('home');

Route::get('login',[PublicController::class, 'login'])->name('login');

Route::get('product',[PublicController::class, 'product'])->name('product');

Route::get('register',[PublicController::class, 'register'])->name('register');

Route::get('singleProduct',[PublicController::class, 'singleProduct'])->name('singleProduct');

Route::get('tac',[PublicController::class, 'tac'])->name('tac');


// Private  Route
Route::prefix('private')->group(function () {

    Route::get('',[AdminController::class, 'index']);
//User
    Route::get('visit-user',[AdminController::class, 'visitUser'])->name('visitUser');
    Route::get('add-user',[AdminController::class, 'addUser'])->name('addUser');
    Route::post('add-user',[AdminController::class, 'postAddUser'])->name('postAddUser');
    Route::get('update-user/{user}',[AdminController::class, 'updateUser'])->name('updateUser');
    Route::post('update-user/{user}',[AdminController::class, 'postUpdateUser'])->name('postUpdateUser');
//role & permission
    Route::get('visit-permission',[AdminController::class, 'visitPermission'])->name('visitPermission');
    Route::get('add-permission',[AdminController::class, 'addPermission'])->name('addPermission');
    Route::post('add-permission',[AdminController::class, 'postAddPermission'])->name('postAddPermission');
    Route::get('update-permission/{id}',[AdminController::class, 'updatePermission'])->name('updatePermission');
    Route::post('update-permission/{id}',[AdminController::class, 'postUpdatePermission'])->name('postUpdatePermission');
    Route::get('delete-permission/{id}',[AdminController::class, 'deletePermission'])->name('deletePermission');
    Route::get('visit-role',[AdminController::class, 'visitRole'])->name('visitRole');
    Route::get('add-role',[AdminController::class, 'addRole'])->name('addRole');
    Route::post('add-role',[AdminController::class, 'postAddRole'])->name('postAddRole');
    Route::get('update-role/{id}',[AdminController::class, 'updateRole'])->name('updateRole');
    Route::post('update-role/{id}',[AdminController::class, 'postUpdateRole'])->name('postUpdateRole');
    Route::get('delete-role/{id}',[AdminController::class, 'deleteRole'])->name('deleteRole');
//category
    Route::get('visit-category',[AdminController::class, 'visitCategory'])->name('visitCategory');
    Route::get('add-category',[AdminController::class, 'addCategory'])->name('addCategory');
    Route::post('add-category',[AdminController::class, 'postAddCategory'])->name('postAddCategory');
    Route::get('add-parent-category/{id}',[AdminController::class, 'addParentCategory'])->name('addParentCategory');
    Route::post('add-parent-category/{id}',[AdminController::class, 'postAddParentCategory'])->name('postAddParentCategory');
    Route::get('update-category/{id}',[AdminController::class, 'updateCategory'])->name('updateCategory');
    Route::post('update-category/{id}', [AdminController::class, 'postUpdateCategory'])->name('postUpdateCategory');
//tag
    Route::get('visit-tag',[AdminController::class, 'visitTag'])->name('visitTag');
    Route::get('add-tag',[AdminController::class, 'addTag'])->name('addTag');
    Route::post('add-tag', [AdminController::class, 'postAddTag'])->name('postAddTag');
    Route::get('update-tag/{tag}',[AdminController::class, 'updateTag'])->name('updateTag');
    Route::post('update-tag/{id}',[AdminController::class, 'postUpdateTag'])->name('postUpdateTag');
//discount
    Route::get('visit-discount',[AdminController::class, 'visitDiscount'])->name('visitDiscount');
    Route::get('add-discount',[AdminController::class, 'addDiscount'])->name('addDiscount');
    Route::post('add-discount', [AdminController::class, 'postAddDiscount'])->name('postAddDiscount');
    Route::get('update-discount/{discount}',[AdminController::class, 'updateDiscount'])->name('updateDiscount');
    Route::post('update-discount/{id}', [AdminController::class, 'postUpdateDiscount'])->name('postUpdateDiscount');
//product
    Route::get('visit-product', [AdminController::class, 'visitProduct'])->name('visitProduct');
    Route::get('add-product', [AdminController::class, 'addProduct'])->name('addProduct');
    Route::post('add-product',[AdminController::class, 'postAddProduct'])->name('postAddProduct');
    Route::get('update-product/{product}', [AdminController::class, 'updateProduct'])->name('updateProduct');
    Route::post('update-product/{id}',[AdminController::class, 'postUpdateProduct'])->name('postUpdateProduct');
    Route::get('delete-product-image/{id}',[AdminController::class, 'deleteProductImage'])->name('deleteProductImage');
//comment
    Route::get('visit-comment', [AdminController::class, 'visitComment'])->name('visitComment');
    Route::get('update-comment/{comment}', [AdminController::class, 'updateComment'])->name('updateComment');
    Route::post('update-comment/{id}',[AdminController::class, 'postUpdateComment'])->name('postUpdateComment');
//region & city
    Route::get('visit-region',[AdminController::class, 'visitRegion'])->name('visitRegion');
    Route::get('add-region',[AdminController::class, 'addRegion'])->name('addRegion');
    Route::post('add-region',[AdminController::class, 'postAddRegion'])->name('postAddRegion');
    Route::get('update-region/{region}',[AdminController::class, 'updateRegion'])->name('updateRegion');
    Route::post('update-region/{id}',[AdminController::class, 'postUpdateRegion'])->name('postUpdateRegion');
    Route::get('visit-city',[AdminController::class, 'visitCity'])->name('visitCity');
    Route::get('add-city/{id}',[AdminController::class, 'addCity'])->name('addCity');
    Route::post('add-city/{id}',[AdminController::class,'postAddCity'])->name('postAddCity');
    Route::get('update-city/{city}',[AdminController::class, 'updateCity'])->name('updateCity');
    Route::post('update-city/{id}',[AdminController::class,'postUpdateCity'])->name('postUpdateCity');
//address
    Route::get('visit-address',[AdminController::class, 'visitAddress'])->name('visitAddress');
    Route::get('delete-address/{address}',[AdminController::class,'deleteAddress'])->name('deleteAddress');
//order
    Route::get('visit-order',[AdminController::class, 'visitOrder'])->name('visitOrder');
//transaction
    Route::get('visit-transaction', [AdminController::class, 'visitTransaction'])->name('visitTransaction');
//contact
    Route::get('visit-contact', [AdminController::class, 'visitContact'])->name('visitContact');
    Route::get('visit-contact-detail/{contact}', [AdminController::class, 'seeContactDetail'])->name('seeContactDetail');
});
