<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionLogController extends AdminController
{
    public function index(Request $request){
         $actions =DB::table("action_log as al")
            ->leftJoin('users as u', 'al.user_id', '=', 'u.id')
            ->select(['al.*', 'u.username']);
        if($request->has('from') && $request->get('from'))
            $actions = $actions->where('al.created_at', '>', $request->get('from'));

        if($request->has('to') && $request->get('to'))
            $actions = $actions->where('al.created_at', '<', $request->get('to'));
        $actions = $actions->get();
        $this->data["actions"] = $actions;
        return view ('pages.admin.action', $this->data);
    }

}
