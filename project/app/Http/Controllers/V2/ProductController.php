<?php

namespace App\Http\Controllers\V2;

use Illuminate\Http\Request;
use App\Models\Products\Cart;
use App\Models\Products\Category;
use App\Models\Products\Commodity;
use App\Models\Products\SubCategory;

class ProductController extends Controller
{
    public function shop()
    {
        $categories = Category::all();
        return view('landing.products.shop', ['categories'=>$categories]);
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('landing.products.category', ['category'=>$category]);
    }

    public function subCategory($slug)
    {
        $subCategory = SubCategory::where('slug',$slug)->first();
        return view('landing.products.sub_category', ['subCategory'=>$subCategory]);
    }

    public function commodity($slug)
    {
        $commodity = Commodity::where('slug',$slug)->first();

        $cart = new Cart;
        $cartQuantity = $cart->getCommodityQuantity($commodity->id);
        $commodity->cartQuantity = $cartQuantity;
        
        return view('landing.products.commodity', ['commodity'=>$commodity]);
    }
}
