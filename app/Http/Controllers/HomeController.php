<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing.home');
    }

    public function about()
    {
        return view('landing.about');
    }

    public function shop()
    {
        return view('landing.shop');
    }

    public function cart()
    {
        return view('landing.cart');
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
