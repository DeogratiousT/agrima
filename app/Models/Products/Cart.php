<?php

namespace App\Models\Products;

use App\Models\Products\Commodity;
use Illuminate\Support\Facades\Log;
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
        // Redis::flushall();
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
        $itemToStore = ['id' => $commodity->id, 'price' => $commodity->price, 'quantity' => 0];

        if ($this->items) {
            if (array_key_exists($commodity->id, $this->items)) {
                $itemToStore = $this->items[$commodity->id];

                if (($itemToStore['price'] / $itemToStore['quantity']) != $commodity->price) {
                    // Update total price
                    $deductedTotalPrice = $this->totalPrice - $itemToStore['price'];
                    $this->totalPrice = $deductedTotalPrice + ($commodity->price * $itemToStore['quantity']);
                }
            }
        }

        $itemToStore['quantity'] ++;
        $itemToStore['price'] = $commodity->price * $itemToStore['quantity'];
        $this->items[$commodity->id] = $itemToStore;
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
        return [
            'totalQuantity' => $this->totalQuantity,
            'totalPrice' => $this->totalPrice,
            'items' => collect($this->items)->transform(function ($item) {
                return [
                    'commodity' => Commodity::find($item['id']),
                    'price' => $item['price'],
                    'quantity' => $item['quantity']
                ];
            }),
        ];        
    }

    public function updateItems($commodity, $newQuantity)
    {
        if ($this->items) {
            if (array_key_exists($commodity->id, $this->items)) {
                $itemToStore = $this->items[$commodity->id];

                // Deduct old Total Quantity and price
                $deductedTotalQuantity = $this->totalQuantity - $itemToStore['quantity'];
                $deductedTotalPrice = $this->totalPrice - $itemToStore['price'];

                // Update item Price and Quantity
                $itemToStore['quantity'] = $newQuantity;
                $itemToStore['price'] = $commodity->price * $itemToStore['quantity'];

                // Update Totals
                $this->items[$commodity->id] = $itemToStore;
                $this->items= serialize($this->items);
                $this->totalQuantity = $deductedTotalQuantity + $itemToStore['quantity'];
                $this->totalPrice = $deductedTotalPrice + $itemToStore['price'];

                // Persist changes to Redis
                $this->storeItems();

                return [
                    'itemSlug' => $commodity->slug,
                    'itemPrice' =>  $itemToStore['price'],
                    'totalPrice' => $this->totalPrice
                ];

            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
