<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = Category::where('parent_id', '>=', 1)->get('name');
        foreach ($categories as $category){
            $this->insertProduct($faker, $category->name);
        }
    }
    public function insertProduct($faker, $name){
        for ($i = 1; $i<rand(3,9); $i++){
            DB::table('products')->insert([
                "name" => $faker->unique()->word,
                "description" => $faker->text(500),
                "price" => rand(250.00, 2500.00),
                "category_id" => Category::where('name', $name)->first('id')->id,
                "created_at" => now()
            ]);
        }
    }
}
