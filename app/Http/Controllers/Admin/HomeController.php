<?php

namespace App\Http\Controllers\Admin;


use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends AdminController
{

    public function index(){

        $users = User::with('orderDetails')->withCount('orders')->orderBy('orders_count', 'desc')->paginate(10);
        $products = Product::with('orderDetails')->withCount('reviews')->orderBy('reviews_count', 'desc')->paginate(10);
        $topProducts = Product::withSum('orderDetails', 'unit_price')
            ->withSum('orderDetails', 'quantity')
            ->orderBy('order_details_sum_quantity', 'desc')
            ->orderBy('order_details_sum_unit_price', 'desc')
            ->get()
            ->take(10);
        $this->data["top"] = $topProducts;
        $this->data["users"] = $users;
        $this->data["reviews"] = Review::all();
        $this->data["products"] = $products;
        $this->data["orders"] = Order::with('orderDetails')->get();
        return view('pages.admin.dashboard', $this->data);
    }

    public function orders(){
        $this->data["newOrders"] = Order::with('user', 'orderDetails')->where('status', 0)->get();
        $this->data["ordersHistory"] = Order::with('user', 'orderDetails')->where('status', 1)->get();
        return view('pages.admin.orders', $this->data);
    }
    public function updateOrders(Request $request){
        try{
            $order = Order::where('id', $request->id)->first();
            if($request->action == "accept"){
                $order->acceptedAt = now();
            }
            $order->status = 1;
            $order->save();
            return response()->json(["message" => "Success"]);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return response()->json(['message' => 'error message'], 500);
        }
    }
}
