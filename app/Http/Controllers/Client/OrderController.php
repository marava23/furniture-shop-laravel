<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends ClientController
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
        $items = Cart::where('user_id', $request->id)->get();
        try{
            DB::beginTransaction();
            $id = DB::table('orders')->insertGetId([
                "acceptedAt" => null,
                "status" => 0,
                "user_id" => $request->id,
                "created_at" => now()
            ]);
            foreach ($items as $item){
                $product = Product::where('id', $item->product_id)->first();
                DB::table('order_details')->insert([
                    "order_id" => $id,
                    "product_id" => $product->id,
                    "unit_price" => $product->price,
                    "quantity" => $item->quantity,
                    "name" => $product->name,
                    "discount" => 0
                ]);
            }
            Cart::where('user_id', $request->id)->delete();
            DB::commit();
            $this->logAction("User made an order.", $request, session('user')->id);
            return response()->json(["message" => "Success"]);
        }
        catch (\Exception $exception){
            DB::rollBack();
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
