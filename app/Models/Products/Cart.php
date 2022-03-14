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
                $itemToUpdate = $this->items[$commodity->id];

                // Deduct old Total Quantity and price
                $deductedTotalQuantity = $this->totalQuantity - $itemToUpdate['quantity'];
                $deductedTotalPrice = $this->totalPrice - $itemToUpdate['price'];

                // Update item Price and Quantity
                $itemToUpdate['quantity'] = $newQuantity;
                $itemToUpdate['price'] = $commodity->price * $itemToUpdate['quantity'];

                // Update Totals
                $this->items[$commodity->id] = $itemToUpdate;
                $this->items= serialize($this->items);
                $this->totalQuantity = $deductedTotalQuantity + $itemToUpdate['quantity'];
                $this->totalPrice = $deductedTotalPrice + $itemToUpdate['price'];

                // Persist changes to Redis
                $this->storeItems();

                return [
                    'itemSlug' => $commodity->slug,
                    'itemPrice' =>  $itemToUpdate['price'],
                    'totalPrice' => $this->totalPrice,
                    'totalQuantity' => $this->totalQuantity
                ];

            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function deleteItem($commodity)
    {
        if ($this->items) {
            if (array_key_exists($commodity->id, $this->items)) {
                $itemToRemove = $this->items[$commodity->id];

                // Deduct old Total Quantity and price
                $deductedTotalQuantity = $this->totalQuantity - $itemToRemove['quantity'];
                $deductedTotalPrice = $this->totalPrice - $itemToRemove['price'];
                Log::info($this->items);
                // Update Totals
                unset($this->items[$commodity->id]);
                Log::info($this->items);

                $this->items = serialize($this->items);
                $this->totalQuantity = $deductedTotalQuantity;
                $this->totalPrice = $deductedTotalPrice;

                // Persist changes to Redis
                $this->storeItems();

                return [
                    'itemSlug' => $commodity->slug,
                    'totalPrice' => $this->totalPrice,
                    'totalQuantity' => $this->totalQuantity
                ];

            }else{
                Log::info('nje');
                return false;
            }
        }else{
            return false;
        }
    }
}
