<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $pictures;
    public $products = [];
    public function run()
    {
        $this->products = Product::with('category')->get();
        foreach ($this->products as $product){
            switch ($product->category->name){
                case "Sectionals" : $this->pictures = ["img/furniture/sectional1.webp", "img/furniture/sectional2.webp", "img/furniture/sectional3.webp"];
                $this->insertPictures($this->pictures, $product->id); break;
                case "Sofas" :$this->pictures = ["img/furniture/sofa1.webp", "img/furniture/sofa2.webp"];
                $this->insertPictures($this->pictures, $product->id); break;
                case "Chairs & Seating": $this->pictures= ["img/furniture/chair1.webp", "img/furniture/chair2.webp", "img/furniture/chair3.webp"];
                $this->insertPictures($this->pictures, $product->id); break;
                case "Coffee Tables" : $this->pictures = ["img/furniture/coffeetable1.webp", "img/furniture/coffeetable2.webp", "img/furniture/coffeetable3.webp"];
                $this->insertPictures($this->pictures, $product->id); break;
                case "Bookcases" : $this->pictures = ["img/furniture/bookcases1.webp", "img/furniture/bookcases2.webp"];
                $this->insertPictures($this->pictures, $product->id); break;
                case "Beds & Headboards" : $this->pictures= ["img/furniture/bed1.webp", "img/furniture/bed2.webp", "img/furniture/bed3.webp"];
                $this->insertPictures($this->pictures, $product->id); break;
                case "Bedroom Sets" : $this->pictures= ["img/furniture/bedroomset1.webp", "img/furniture/bedroomset2.webp", "img/furniture/bedroomset3.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Dressers & Chest" : $this->pictures= ["img/furniture/dresser1.webp", "img/furniture/dresser2.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Nightstands" : $this->pictures= ["img/furniture/nightstand1.webp", "img/furniture/nightstand2.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Daybeds" : $this->pictures= ["img/furniture/daybed1.webp", "img/furniture/daybed2.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Dining Tables" : $this->pictures= ["img/furniture/dinningtable1.webp", "img/furniture/dinningtable2.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Food pantries" : $this->pictures= ["img/furniture/food1.webp", "img/furniture/food2.webp", "img/furniture/bed3.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Bar furniture" : $this->pictures= ["img/furniture/bar1.webp", "img/furniture/bar2.webp", "img/furniture/bar3.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Desks" : $this->pictures= ["img/furniture/desk1.webp", "img/furniture/desk2.webp", "img/furniture/desk3.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Office Chairs" : $this->pictures= ["img/furniture/officechair1.webp", "img/furniture/officechair2.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Office Stools" : $this->pictures= ["img/furniture/officestool1.webp", "img/furniture/officestool2.webp" ];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Game tables" : $this->pictures= ["img/furniture/pool1.webp", "img/furniture/pool2.webp" ];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Gaming chairs" : $this->pictures= ["img/furniture/gamingchair1.webp", "img/furniture/gamingchair2.webp" ];
                    $this->insertPictures($this->pictures, $product->id); break;
                case "Life size Cutouts" : $this->pictures= ["img/furniture/statue1.webp", "img/furniture/pool1.webp"];
                    $this->insertPictures($this->pictures, $product->id); break;
                default : break;
            }
        }

    }
    public function insertPictures($pictures, $id){
        foreach ($pictures as $picture){
            DB::table('product_pictures')->insert([
                'product_id' => $id,
                'picture' => $picture,
                'active' => 1,
                'created_at' => now()
            ]);
        }
    }
}
