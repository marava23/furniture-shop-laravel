<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        $year = rand(2015, 2021);
        $month = rand(1, 12);
        $day = rand(1, 28);
        $users = User::all('id');
        return [
            "acceptedAt" => Carbon::create($year, $month, $day, 0 ,0 ,0),
            "status" => 1,
            "user_id"=> $users->random(),
            "created_at" => Carbon::create($year, $month, $day, 0 ,0 ,0),
            "updated_at" => Carbon::create($year, $month, $day, 0 ,0 ,0)
        ];
    }
}
