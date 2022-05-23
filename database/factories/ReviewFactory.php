<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;
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
        $products = Product::all('id');
        return [
            'product_id' => $products->random(),
            'review' => $this->faker->text(),
            'email' => $this->faker->email(),
            'name' => $this->faker->name,
            'created_at' => Carbon::create($year, $month, $day, 0 ,0 ,0),
            'updated_at' => null
        ];
    }
}
