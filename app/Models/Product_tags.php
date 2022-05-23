<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_tags extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
