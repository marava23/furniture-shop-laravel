<?php

namespace Database\Seeders;

use App\Models\Review;
use Database\Factories\ReviewFactory;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::factory()->times(250)->create();
    }
}
