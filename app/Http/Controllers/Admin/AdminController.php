<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends BasicController
{
    protected $data;

    public function __construct()
    {
        parent::__construct();

        $this->data["menu"] = [
            [
                "name" => "Dashboard",
                "route" => "admin.home"
            ],
            [
                "name" => "Products",
                "route" => "admin.products.index"
            ],
            [
                "name" => "Orders",
                "route" => "admin.orders"
            ],
            [
                "name" => "User actions",
                "route" => "admin.actions"
            ]
        ];
    }

}
