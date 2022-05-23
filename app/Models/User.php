<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function orderDetails(){
        return $this->hasManyThrough(Order_details::class, Order::class, 'user_id', 'order_id', 'id', 'id');
    }
}
