<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invoice::query()->truncate();
        InvoiceProduct::query()->truncate();
        for ($i = 0; $i < 10; $i++) {
            $invoice = Invoice::query()->create([
                'unique_code' => rand(1000000,999999999),
                'user_id' => 101,
                'address_id' => 1,
                'coupon_id' => 1,
                'status' => Invoice::STATUSES['processing'],
                'delivery_type' => Invoice::DELIVERY_TYPES['simple'],
            ]);

            $products = Product::query()->inRandomOrder()->take(rand(1,15))->get();
            foreach ($products as $product)
            {
                $count = rand(1,7);
                InvoiceProduct::query()
                    ->create([
                        'invoice_id' => $invoice->id,
                        'product_id' => $product->id,
                        'count' => $count,
                        'product_original_price' => $product->purchase_price,
                        'product_purchase_price' => $product->purchase_price,
                        'total_original_price' => $count * $product->purchase_price,
                        'total_purchase_price' => $count * $product->purchase_price,
                    ]);
            }
        }
        for ($i = 0; $i < 10; $i++) {
            $invoice = Invoice::query()->create([
                'unique_code' => rand(1000000,999999999),
                'user_id' => 101,
                'address_id' => 1,
                'coupon_id' => 1,
                'status' => Invoice::STATUSES['done'],
                'delivery_type' => Invoice::DELIVERY_TYPES['simple'],
            ]);
            $products = Product::query()->inRandomOrder()->take(rand(1,15))->get();
            foreach ($products as $product)
            {
                $count = rand(1,7);
                InvoiceProduct::query()
                    ->create([
                        'invoice_id' => $invoice->id,
                        'product_id' => $product->id,
                        'count' => $count,
                        'product_original_price' => $product->purchase_price,
                        'product_purchase_price' => $product->purchase_price,
                        'total_original_price' => $count * $product->purchase_price,
                        'total_purchase_price' => $count * $product->purchase_price,
                    ]);
            }
        }
        for ($i = 0; $i < 10; $i++) {
            $invoice = Invoice::query()->create([
                'unique_code' => rand(1000000,999999999),
                'user_id' => 101,
                'address_id' => 1,
                'coupon_id' => 1,
                'status' => Invoice::STATUSES['canceled'],
                'delivery_type' => Invoice::DELIVERY_TYPES['simple'],
            ]);
            $products = Product::query()->inRandomOrder()->take(rand(1,15))->get();
            foreach ($products as $product)
            {
                $count = rand(1,7);
                InvoiceProduct::query()
                    ->create([
                        'invoice_id' => $invoice->id,
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
}
