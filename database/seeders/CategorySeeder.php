<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $categories;
    public $livingRoomCategories;
    public $bedRoomCategories;
    public $kitchenCategories;
    public $officeCategories;
    public $gameCategories;
    public function run()
    {
        $this->categories = ["Living room", "Bedroom", "Kitchen & Dining", "Office", "Game Tables & Game Room"];
        foreach ($this->categories as $category){
            DB::table('categories')->insert([
                "name" => $category,
                "created_at"=> date("Y-m-d H:i:s")
            ]);
        }
        $this->livingRoomCategories=["Sectionals", "Sofas", "Chairs & Seating", "Coffee Tables", "Bookcases"];
        $this->insertCategory($this->livingRoomCategories, 'Living room');
        $this->bedRoomCategories=["Beds & Headboards", "Bedroom Sets", "Dressers & Chest", "Nightstands", "Daybeds"];
        $this->insertCategory($this->bedRoomCategories, 'Bedroom');
        $this->kitchenCategories = ["Dining Tables", "Food pantries", "Bar furniture"];
        $this->insertCategory($this->kitchenCategories, 'Kitchen & Dining');
        $this->officeCategories = ["Desks", "Office Chairs", "Office Stools"];
        $this->insertCategory($this->officeCategories, 'Office');
        $this->gameCategories = ["Game tables", "Gaming chairs", "Life size Cutouts"];
        $this->insertCategory($this->gameCategories, 'Game Tables & Game Room');
    }
    protected function insertCategory($categories, $parentCategory){
        foreach ($categories as $category){
            DB::table('categories')->insert([
                "name" => $category,
                "created_at" => date("Y-m-d H:i:s"),
                "parent_id" => Category::where('name', $parentCategory)->first('id')->id
            ]);
        }
    }
}
