<?php

namespace App\Http\Controllers\Client;


class HomeController extends ClientController
{
    public function index(){
        return view('pages.client.home', $this->data);
    }
    public function autor(){
        return view('pages.client.autor', $this->data);
    }
}
