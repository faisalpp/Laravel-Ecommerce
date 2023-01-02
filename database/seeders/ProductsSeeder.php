<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0;$i<=50;$i++){
        $product = new Product();
        $product->name = $faker->text(20);
        $product->desc = $faker->text(40);
        $product->image = "EC1670684904_chair2.jpg";
        $product->price = 250 + $i;
        $product->quantity = 10 + $i;
        $product->save();
     }
    }
}
