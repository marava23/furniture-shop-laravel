<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends ClientController
{
    public function index(){
        return view('pages.client.registration', $this->data);
    }
    public function store(RegisterUserRequest $request){
        try{
            DB::table('users')->insert([
                "email" => $request->email,
                "firstName" => $request->firstname,
                "lastName" => $request->lastname,
                "username" => $request->username,
                "password" => Hash::make($request->password),
                "role_id" => Role::where('name', 'user')->first('id')->id,
                "created_at" => now()
            ]);
            $user = User::where('email', $request->email)->first();
            $request->session()->put('user', $user);
            $this->logAction("User registred.", $request, $user->id);
            return redirect()->route('products.index');
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->back();
        }
    }
    public function logForm(){
        return view('pages.client.login', $this->data);
    }
    public function login(LoginRequest $request){
        try{
            $user = User::where('email', $request->email)->first();
            if(!$user || $user->password !== md5($request->password)){
                $userId = $user != null ? $user->id : null;
                $this->logAction("User failed to login.", $request, $userId);
                return redirect()->back()->withErrors(['Invalid email or password']);
            }
            $request->session()->put('user', $user);
            $this->logAction("User logged in.", $request, $user->id);
            return redirect()->route('products.index');
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->back();
        }
    }
    public function logout(Request $request){
        try{
            $userId = $request->session()->get('user')->id;
            $request->session()->remove('user');
            $this->logAction("User logged out.", $request, $userId);
            return response()->json(["message" => "Success"]);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return response()->json(['message' => 'error message'], 500);
        }
    }
}
