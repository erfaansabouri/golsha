<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Product::all() as $product)
        {
            DB::table('product_images')
                ->insert([
                    'product_id' => $product->id,
                    'name' => 'images/fdph4xhLT9hLaQYB.jpg',
                ]);
        }
    }
}
