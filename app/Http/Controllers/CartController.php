<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products\Cart;
use App\Models\Products\Commodity;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

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
        $commodity = Commodity::where('slug', $slug)->first();

        abort_unless($commodity, 403);

        $cart = new Cart;
        $cart->addItem($commodity);
        
        return back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {      
        $commodity = Commodity::where('slug', $request->slug)->first();

        abort_unless($commodity, 403);

        $cart = new Cart;
        $updatedCart = $cart->updateItems($commodity, $request->newQuantity);

        if ($updatedCart) {
            return Response::json($updatedCart);
        }
    }

    public function remove($slug)
    {
        if($slug) {
            $cart = session()->get('cart');
            if(isset($cart[$slug])) {
                unset($cart[$slug]);
                session()->put('cart', $cart);
            }
            return back()->with('success','Product removed successfully');
        }
    }
}
