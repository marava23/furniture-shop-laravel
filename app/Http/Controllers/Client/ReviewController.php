<?php

namespace App\Http\Controllers\Client;
use Illuminate\Http\Request;
use App\Http\Requests\MakeReviewRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReviewController extends ClientController
{
    public function store(MakeReviewRequest $request){
        try{
            DB::table('reviews')->insert([
                "product_id" => $request->product,
                "review" => $request->review,
                "email" => $request->email,
                "name" => $request->name,
                "created_at"=> now()
            ]);
            $userId = session()->has('user')  ? session('user')->id : null;
            $this->logAction("User made a review.", $request, $userId);
            return redirect()->route('products.show', ["product" => $request->product]);
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->back()->withErrors(['Sending review failed.']);
        }

    }
}
