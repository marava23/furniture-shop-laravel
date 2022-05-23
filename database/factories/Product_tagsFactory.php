<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Product_tags;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class Product_tagsFactory extends Factory
{
    protected $model = Product_tags::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $products = Product::all('id');
        $tags = Tag::all('id');
        return [
            'product_id' => $products->random(),
            'tag_id' => $tags->random()
        ];
    }
}
