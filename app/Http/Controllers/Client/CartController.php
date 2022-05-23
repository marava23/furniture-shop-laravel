<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class CartController extends ClientController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
            try{
                if(Cart::where('user_id', session('user')->id)->where('product_id', $request->id)->count() > 0){
                    $item = Cart::where('user_id', session('user')->id)->where('product_id', $request->id)->first();
                    $item->quantity = $item->quantity + 1;
                    $item->save();
                }
                else{
                    DB::table('carts')->insert([
                        "product_id" => $request->id,
                        "user_id" => session('user')->id,
                        "quantity" => 1,
                        "created_at" => now()
                    ]);
                }
                $this->logAction("User added/updated cart item with productId $request->id", $request, session('user')->id);
                return response()->json(["message" => "Success"]);
            }
            catch (\Exception $exception){
                    Log::error($exception->getMessage());
                return response()->json(['message' => 'error message'], 500);
            }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try{
            $item = Cart::where('user_id', session('user')->id)->where('product_id', $request->id)->first();
            if($item->quantity > 1){
                $item->quantity = $item->quantity - 1;
                $item->save();
            }
            else{
                Cart::where('user_id', session('user')->id)->where('product_id', $request->id)->delete();
            }
            $this->logAction("User removed/reduced cart item with productId $request->id", $request, session('user')->id);
            return response()->json(["message" => "Success"]);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return response()->json(['message' => 'error message'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        try{
            Cart::where('user_id', session('user')->id)->where('product_id', $request->id)->delete();
            $this->logAction("User removed/reduced cart item with productId $request->id", $request, session('user')->id);
            return response()->json(["message" => "Success"]);
        }
        catch (Exception $exception){
            Log::error($exception->getMessage());
            return response()->json(['message' => 'error message'], 500);
        }
    }
}
