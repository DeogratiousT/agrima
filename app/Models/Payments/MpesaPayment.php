<?php

namespace App\Models\Payments;

use App\Models\User;
use App\Models\Products\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MpesaPayment extends Model
{
    use HasFactory;

    protected $fillable = ['receipt_number','date','amount','phone','user_id', 'order_id'];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
