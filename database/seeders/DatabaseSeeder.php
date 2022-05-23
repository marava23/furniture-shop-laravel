<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ProductPictureSeeder::class,
            ReviewSeeder::class,
            TagSeeder::class,
            ProductTagsSeeder::class,
            OrderSeeder::class,
            OrderDetailsSeeder::class,
        ]);
    }
}
