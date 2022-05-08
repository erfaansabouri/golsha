<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    use HasFactory;

    public function getCommaSeperatedPriceAttribute()
    {
        return number_format($this->price);
    }

    public function purchasePrice()
    {
        if(!empty($this->discount_percentage))
        {
            return ((100 - $this->discount_percentage) * $this->price) / 100;
        }
        return $this->price;
    }

    public function getPurchasePriceAttribute()
    {
        return $this->purchasePrice();
    }

    public function images()
    {
        return $this->hasMany(ImageProduct::class);
    }

    public function firstImage()
    {
        return $this->images()->first();
    }
}
