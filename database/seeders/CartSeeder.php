<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = Cart::query()
            ->where('user_id', 101)
            ->first();
        if (!$cart)
        {
            $cart = Cart::query()->create([
                'user_id' => 101,
            ]);
        }

        $products = Product::query()->inRandomOrder()->take(10)->get();
        foreach ($products as $product)
        {
            $count = rand(1,7);
            CartProduct::query()
                ->create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'count' => $count,
                    'product_original_price' => $product->purchase_price,
                    'product_purchase_price' => $product->purchase_price,
                    'total_original_price' => $count * $product->purchase_price,
                    'total_purchase_price' => $count * $product->purchase_price,
                ]);
        }
    }
}
