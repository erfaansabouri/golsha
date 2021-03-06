<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $table = 'cart_products';
    protected $guarded = [];

    public function productInfo()
    {
        return $this->hasOne(Product::class,'id','product_id')->withTrashed();
    }

    public function isPurchasedWithDiscount()
    {
        if ($this->product_original_price == $this->product_purchase_price)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function discountPercentage()
    {
        return round((($this->product_original_price - $this->product_purchase_price) / $this->product_original_price) *100);
    }

    public function totalOriginalPrice()
    {
        return $this->product_original_price * $this->count;
    }

    public function totalPurchasePrice()
    {
        return $this->product_purchase_price * $this->count;
    }
}
