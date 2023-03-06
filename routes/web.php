<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('', [PublicController::class, 'index']);

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

