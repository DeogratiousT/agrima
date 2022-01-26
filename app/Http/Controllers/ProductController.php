<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products\Category;

class ProductController extends Controller
{
    public function shop()
    {
        $categories = Category::all();
        return view('landing.products.shop', ['categories'=>$categories]);
    }

    public function category($slug)
    {
        $categories = Category::all();
        return view('landing.products.category', ['categories'=>$categories]);
    }

    public function subCategory($slug)
    {
        $categories = Category::all();
        return view('landing.products.sub_category', ['categories'=>$categories]);
    }

    public function commodity($slug)
    {
        $categories = Category::all();
        return view('landing.products.commodity', ['categories'=>$categories]);
    }
}
