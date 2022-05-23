<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends ClientController
{
    public function show(User $user){
        $this->data["user"] = User::with('orders')->where('id', $user->id)->first();
        return view('pages.client.user', $this->data);
    }
}
