<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Product_tags;
use Illuminate\Database\Seeder;

class ProductTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Product_tags::factory()->times(200)->create()->unique;
    }
}
