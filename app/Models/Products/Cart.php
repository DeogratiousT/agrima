<?php

namespace App\Models\Products;

use Illuminate\Support\Facades\Session;

class Cart
{
    public $items = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct()
    {
        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        
        if ($currentCart) {
            $this->items = $currentCart->items;
            $this->totalPrice = $currentCart->totalPrice;
            $this->totalQuantity = $currentCart->totalQuantity;
        }
    }

    public function addItem($commodity)
    {
        $itemToStore = ['item' => $commodity, 'price' => $commodity->price, 'quantity' => 0];

        if ($this->items) {
            if (array_key_exists($commodity->id, $this->items)) {
                $itemToStore = $this->items[$commodity->id];
            }
        }

        $itemToStore['quantity'] ++;
        $itemToStore['price'] = $commodity->price * $itemToStore['quantity'];
        $this->items[$commodity->id] = $itemToStore;
        $this->totalQuantity ++;
        $this->totalPrice += $commodity->price;
    }
}
