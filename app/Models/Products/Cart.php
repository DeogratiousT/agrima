<?php

namespace App\Models\Products;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class Cart
{
    public $user_id;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public $items = null;


    public function __construct()
    {
        $this->user_id = Auth::id();
        $currentCart = Redis::exists($this->user_id) ? true : false;

        if ($currentCart) {
            $this->totalPrice = Redis::hget($this->user_id, 'totalPrice');
            $this->totalQuantity = Redis::hget($this->user_id, 'totalQuantity');
            $this->items = unserialize(Redis::hget($this->user_id, 'items'));
        }
    }

    public function addItem($commodity)
    {
        $itemToStore = ['slug' => $commodity->slug, 'price' => $commodity->price, 'quantity' => 0];

        if ($this->items) {
            if (array_key_exists($commodity->slug, $this->items)) {
                $itemToStore = $this->items[$commodity->slug];
            }
        }

        $itemToStore['quantity'] ++;
        $itemToStore['price'] = $commodity->price * $itemToStore['quantity'];
        $this->items[$commodity->slug] = $itemToStore;
        $this->items= serialize($this->items);
        $this->totalQuantity ++;
        $this->totalPrice += $commodity->price;

        $this->storeItems();
    }

    public function storeItems()
    {
        Redis::hmset($this->user_id, 'totalQuantity', $this->totalQuantity, 'totalPrice', $this->totalPrice, 'items', $this->items);
    }

    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getItems()
    {
        dd($this->user_d = [
            'totalQuantity' => $this->totalQuantity,
            'totalPrice' => $this->totalPrice,
            'items' => $this->items
        ]);        
    }
}
