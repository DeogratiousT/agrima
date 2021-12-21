<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products\Commodity;

class CartController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart($slug)
    {        
        $product = Commodity::where('slug', $slug)->first();

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
        // if cart is empty, then this is the first product
        if(!$cart) {
            $cart = [
                    $slug => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "cover_image" => $product->cover_image
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$slug])) {
            $cart[$slug]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$slug] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "cover_image" => $product->cover_image
        ];

        session()->put('cart', $cart);
        
        return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
    }

    public function incrementQty($slug)
    {        
        $product = Commodity::where('slug', $slug)->first();

        if(!$product) {
            return redirect()->route('cart')->with('error','Product Not Found');
        }

        $cart = session()->get('cart');
        // increment quantity
        if(isset($cart[$slug])) {
            $cart[$slug]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Quantity Incremented successfully!');
        }

        return redirect()->route('cart')->with('error','Request Denied');
    }

    public function decrementQty($slug)
    {        
        $product = Commodity::where('slug', $slug)->first();

        if(!$product) {
            return redirect()->route('cart')->with('error','Product Not Found');
        }

        $cart = session()->get('cart');
        // Decrement quantity
        if(isset($cart[$slug])) {
            if ($cart[$slug]['quantity'] > 1) {
                $cart[$slug]['quantity']--;

                session()->put('cart', $cart);

                return redirect()->route('cart')->with('success', 'Quantity Decremented successfully!');
            }
            return redirect()->route('cart')->with('error', 'Quantity Cannot be Decremented any Further!');
        }

        return redirect()->route('cart')->with('error','Request Denied');
    }

    public function remove($slug)
    {
        if($slug) {
            $cart = session()->get('cart');
            if(isset($cart[$slug])) {
                unset($cart[$slug]);
                session()->put('cart', $cart);
            }
            return redirect()->route('cart')->with('success','Product removed successfully');
        }
    }
}