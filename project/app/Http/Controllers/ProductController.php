<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products\Cart;
use App\Models\Products\Category;
use App\Models\Products\Commodity;
use App\Http\Controllers\Controller;
use App\Models\Products\SubCategory;

class ProductController extends Controller
{
    public function shop()
    {
        $categories = Category::with('subCategories.commodities')->get();
        return view('landing.products.shop', ['categories'=>$categories]);
    }

    public function category($slug)
    {
        $category = Category::with('subCategories.commodities')->where('slug',$slug)->first();
        return view('landing.products.category', ['category'=>$category]);
    }

    public function subCategory($slug)
    {
        $subCategory = SubCategory::with('commodities')->where('slug',$slug)->first();
        return view('landing.products.sub_category', ['subCategory'=>$subCategory]);
    }

    public function commodity($slug)
    {
        $commodity = Commodity::where('slug',$slug)->first();
        $relatedCommodities = Commodity::where('sub_category_id',$commodity->sub_category_id)
                                    ->where('slug', '<>', $commodity->slug)
                                ->latest()
                            ->limit(4)
                        ->get();
        $categories = Category::all();

        $cart = new Cart;
        $cartQuantity = $cart->getCommodityQuantity($commodity->id);
        $commodityExists = $cart->commodityExists($commodity->id);
        $commodity->cartQuantity = $cartQuantity;
        $commodity->exists = $commodityExists;
        $commodity->cover_image =  env('AWS_URL') . '/' . 'commodity-images/' . $commodity->cover_image ?? $fallbackImageUrl;
        
        return view('landing.products.commodity', [
            'categories' => $categories, 
            'relatedCommodities' => $relatedCommodities,
            'commodity' => $commodity
        ]);
    }
}