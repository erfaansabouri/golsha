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

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function faqs()
    {
        return $this->hasMany(ProductFaq::class);
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

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    public function images()
    {
        return $this->hasMany(ImageProduct::class);
    }

    public function firstImage()
    {
        return $this->images()->firstOr(function (){
            return null;
        });
    }
}
