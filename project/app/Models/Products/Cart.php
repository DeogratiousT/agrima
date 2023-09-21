<?php

namespace App\Models\Products;

use App\Models\Products\Commodity;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // $currentCart = Redis::exists($this->user_id) ? true : false;
        $currentCart = DB::table('carts')->where('user_id',$this->user_id)->first() ? true : false;

        if ($currentCart) {
            // $this->totalPrice = Redis::hget($this->user_id, 'totalPrice');
            $this->totalPrice = DB::table('carts')->where('user_id',$this->user_id)->first()->totalPrice;

            // $this->totalQuantity = Redis::hget($this->user_id, 'totalQuantity');
            $this->totalQuantity = DB::table('carts')->where('user_id',$this->user_id)->first()->totalQuantity;

            // $this->items = unserialize(Redis::hget($this->user_id, 'items'));
            $this->items = unserialize(DB::table('carts')->where('user_id',$this->user_id)->first()->items);
        }
    }

    public function addItem($commodity, $quantity)
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

        $itemToStore['quantity'] += $quantity;
        $itemToStore['price'] = $commodity->price * $itemToStore['quantity'];
        $this->items[$commodity->id] = $itemToStore;
        $this->items= serialize($this->items);
        $this->totalQuantity += $quantity;
        $this->totalPrice += ($commodity->price * $quantity);

        $this->storeItems();
    }

    public function storeItems()
    {
        // Redis::hmset($this->user_id, 'totalQuantity', $this->totalQuantity, 'totalPrice', $this->totalPrice, 'items', $this->items);
        DB::table('carts')->upsert([
                [
                'user_id' => $this->user_id,
                'totalQuantity' => $this->totalQuantity,
                'totalPrice' => $this->totalPrice,
                'items' => $this->items
            ]
        ],
        ['user_id'],
        ['totalQuantity','totalPrice','items']);
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
                // Update Totals
                unset($this->items[$commodity->id]);

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
                return false;
            }
        }else{
            return false;
        }
    }

    public function getCommodityQuantity($commodity)
    {
        if ($this->items) {
            $item = array_filter($this->items, function($item) use($commodity) {
                return $item['id'] == $commodity;
            }, ARRAY_FILTER_USE_BOTH);
    
            if ($item) {
                return $item[$commodity]['quantity'];
            }
        }        

        return 0;
    }

    public function commodityExists($commodity)
    {
        if ($this->items) {
            $item = array_filter($this->items, function($item) use($commodity) {
                return $item['id'] == $commodity;
            }, ARRAY_FILTER_USE_BOTH);
    
            if ($item) {
                return true;
            }
        }        

        return false;
    }
}
