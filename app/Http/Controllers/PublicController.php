<?php

namespace App\Http\Controllers;

use App\Actions\CategoryAction;
use App\Actions\ProductAction;
use App\Actions\TagAction;
use App\Actions\UserAction;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        return redirect()->route('home');
    }
    public function cart() {
        return view('public.cart');
    }

    public function checkout() {
        return view('public.checkout');
    }

    public function contact() {
        return view('public.contact');
    }

    public function faq() {
        return view('public.faq');
    }

    public function home() {
        $lestProducts = ProductAction::getLastProducts(4);
        $menProducts = ProductAction::getProductWithSelectedCategory(1,6);
        $womenProducts = ProductAction::getProductWithSelectedCategory(2,6);
        return view('public.home' , compact('lestProducts','menProducts','womenProducts'));
    }

    public function login() {
        return view('public.login');
    }
    public function postLogin(LoginRequest $request) {
        $report = UserAction::login($request);
        switch($report)
        {
            case $report['UserNotFound'] == 1:
                return redirect()->back()->with('danger', 'کاربر مورد نظر وجود ندارد! لطفا ثبت نام کنید');
            case $report['WrongPassword'] == 1:
                return redirect()->back()->with('danger', 'رمز عبور صحیح نیست');
            case $report['UserLogin'] == 1:
                return redirect(route('visitUser'));
        }
    }

    public function logout(){
        UserAction::logout();
        return redirect(route('home'));
    }

    public function product() {
        $tag = null;
        $categories = null;
        $products = ProductAction::getAllProducts();
        $newestMenProducts = ProductAction::getProductWithSelectedCategory(1,3);
        $newestWomenProducts = ProductAction::getProductWithSelectedCategory(2,3);
        return view('public.product',compact('tag','categories','products','newestMenProducts','newestWomenProducts'));
    }
    public function filterProductByCategory($category_id) {
        $tag = null;
        $checkCategory = CategoryAction::getCategory($category_id);
        if (!$checkCategory) {
            return redirect(route('product'));
        }else
        {
            $categories = CategoryAction::getAllCategoriesWithNode($category_id);
            $products = ProductAction::getProductWithSelectedCategory($category_id,null);
            $newestMenProducts = ProductAction::getProductWithSelectedCategory(1,3);
            $newestWomenProducts = ProductAction::getProductWithSelectedCategory(2,3);
            return view('public.product',compact('tag','categories','products','newestMenProducts','newestWomenProducts'));
        }
    }
    public function filterProductByTag($tag_id) {
        $tag = TagAction::getTag($tag_id);
        if ($tag)
        {
            $categories = null;
            $products = ProductAction::getAllProductsWithTagID($tag_id);
            $newestMenProducts = ProductAction::getProductWithSelectedCategory(1,3);
            $newestWomenProducts = ProductAction::getProductWithSelectedCategory(2,3);
            return view('public.product',compact('tag','categories','products','newestMenProducts','newestWomenProducts'));
        }else
            return redirect(route('home'));
    }

    public function register() {
        return view('public.register');
    }

    public function singleProduct($product_id) {
        $product = ProductAction::getProduct($product_id);
        $lestProducts = ProductAction::getLastProducts(3);
        return view('public.singleProduct', compact('product','lestProducts'));
    }

    public function tac() {
        return view('public.tac');
    }
}
