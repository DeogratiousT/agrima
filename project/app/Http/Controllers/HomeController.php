<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products\Cart;
use App\Models\Products\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['cart','checkout']);
    }

    public function index()
    {
        $categories = Category::all();
        $fallbackImageUrl = asset('assets/images/noimage.jpg');

        return view('landing.home', ['categories'=>$categories, 'fallbackImageUrl'=>$fallbackImageUrl]);
    }

    public function about()
    {
        return view('landing.about');
    }

    public function cart()
    {
        $cart = new Cart;
        $cartItems = $cart->getItems(); 
        return view('landing.cart',['items'=>$cartItems['items'], 'total'=>$cartItems['totalPrice']]);
    }

    public function checkout()
    {
        $cart = new Cart;
        $cartItems = $cart->getItems(); 
        return view('landing.checkout',['items'=>$cartItems['items'], 'total'=>$cartItems['totalPrice']]);
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
