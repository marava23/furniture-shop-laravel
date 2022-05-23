<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    protected $actionModel;
    public function __construct()
    {
        $this->actionModel = new ActionLog();
    }

    public function logAction($action, Request $request, $user_id = null){
        $ip = $request->ip();
        $path = $request->path();
        $method = $request->method();
        $user_id = $request->session()->has("user") ? $request->session()->get("user")->id : $user_id;
        try {
            $this->actionModel->insert($ip, $path, $method, $action, $user_id);
        } catch(\Exception $ex) {
            \Log::error($ex->getMessage());
        }
    }
}
