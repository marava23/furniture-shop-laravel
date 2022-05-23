<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    use HasFactory;
    public function insert($ip, $path, $method, $action, $user_id = null) {
        \DB::table("action_log")->insert([
            "ip" => $ip,
            "path" => $path,
            "method" => $method,
            "action.blade.php" => $action,
            "user_id" => $user_id,
            "created_at" => now()
        ]);
    }

}
