<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Admin\Controller;
use App\Http\Controllers\BasicController;
use App\Models\Cart;
use Illuminate\Http\Request;

class ClientController extends BasicController
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
        if(session()->has('user')){
            $this->data["cart"] = Cart::with('user', 'product')
                ->where('user_id', session('user')->id)
                ->get();
        }
        $this->data["menu"] = [
            [
                "name" => "Home",
                "route" => "home"
            ],
            [
                "name" => "Products",
                "route" => "products.index"
            ],
            [
                "name" => "Contact",
                "route" => "contact"
            ]
        ];
    }
}
