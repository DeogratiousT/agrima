<?php

namespace App\Models\Products;

use App\Models\User;
use App\Models\Payments\MpesaPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'items', 'price', 'quantity'];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments()
    {
        return $this->hasMany(MpesaPayment::class, 'order_id');
    }
}
