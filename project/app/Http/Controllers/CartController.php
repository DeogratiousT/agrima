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

    public function addToCart(Request $request, $slug)
    {
        $commodity = Commodity::where('slug', $slug)->first();
        $quantity = 1;
        if (isset($request->quantity) && $quantity > 0) {
            $quantity = $request->quantity;
        }
          
        abort_unless($commodity, 403);

        $cart = new Cart;
        $cart->addItem($commodity, $quantity);
        
        return redirect()->route('commodity',$commodity)->with('success', 'Product added to cart successfully!');
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

        return false;
    }

    public function remove(Request $request)
    {
        $commodity = Commodity::where('slug', $request->slug)->first();

        abort_unless($commodity, 403);

        $cart = new Cart;
        $reducedCart = $cart->deleteItem($commodity);

        if ($reducedCart) {
            return Response::json($reducedCart);
        }
    }
}
