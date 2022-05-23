<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Order_details;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class Order_detailsFactory extends Factory
{
    protected $model= Order_details::class;
    public $products;
    public $orders;

    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->products = Product::all();
        $this->orders = Order::all('id');
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = $this->products->random();
        return [
            "order_id" => $this->orders->random(),
            "product_id" => $product->id,
            "unit_price"=> $product->price,
            "quantity" => rand(1,10),
            "name" => $product->name,
            "discount" => rand(0,20),
            "created_at" => now(),
            "updated_at" => null
        ];
    }
}
