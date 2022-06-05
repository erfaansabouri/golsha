<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(CartProduct::class);
    }

    public function totalOriginalPrice()
    {
        $products = $this->products()->get();
        $total = 0;
        foreach ($products as $product)
        {
            $total += $product->count * $product->product_original_price;
        }

        if(!empty($cart->delivery_amount))
        {
            $total += $cart->delivery_amount;
        }

        return $total;
    }

    public function totalPurchasePrice()
    {
        $products = $this->products()->get();
        $total = 0;
        foreach ($products as $product)
        {
            $total += $product->count * $product->product_purchase_price;
        }

        if(!empty($this->discount_toman))
        {
            $total = $total - $this->discount_toman;
        }
        elseif(!empty($this->discount_percentage))
        {
            $total =  ((100 - $this->discount_percentage) / 100) * $total ;
        }

        if(!empty($this->delivery_amount))
        {
            $total += $this->delivery_amount;
        }

        return $total;
    }
}
