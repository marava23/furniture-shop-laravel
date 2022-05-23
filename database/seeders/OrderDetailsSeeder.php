<?php

namespace Database\Seeders;

use App\Models\Order_details;
use Illuminate\Database\Seeder;

class OrderDetailsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order_details::factory()->count(200)->create();
    }
}
