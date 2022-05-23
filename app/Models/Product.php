<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productPictures(){
        return $this->hasMany(Product_picture::class, 'product_id')->where('active', 1);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function productTags(){
        return $this->hasMany(Product_tags::class, 'product_id', 'id');
    }
    public function orderDetails(){
        return $this->hasMany(Order_details::class);
    }
    public function tags(){
        return $this->hasManyThrough(Tag::class, Product_tags::class, 'product_id', 'id', 'id', 'tag_id');
    }
}
