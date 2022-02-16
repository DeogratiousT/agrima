<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products\Cart;
use App\Models\Products\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('landing.home', ['categories'=>$categories]);
    }

    public function about()
    {
        return view('landing.about');
    }

    public function shop()
    {
        $categories = Category::all();
        return view('landing.shop', ['categories'=>$categories]);
    }

    public function cart()
    {
        $cart = new Cart;
        return view('landing.cart',['items'=>$cart->items, 'total'=>$cart->totalPrice]);
    }

    public function checkout()
    {
        return view('landing.checkout');
    }

    public function insights()
    {
        return view('landing.insights');
    }

    public function contact()
    {
        return view('landing.contact');
    }
}
