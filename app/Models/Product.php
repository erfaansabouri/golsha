<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;

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

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function verifiedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNotNull('verified_at');
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

    public function getFirstImagePathAttribute()
    {
        return $this->firstImage() ? $this->firstImage()->path : '';
    }

    public function scopeMostSold($query)
    {
        return $query->orderBy('view_count');
    }

    public function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeGolshaPacks($query)
    {
        $query->whereHas('categories', function ($q){
           $q->where('categories.id', 1); // todo
        });
    }

    public function scopeGolshaBenoosh($query)
    {
        $query->whereHas('categories', function ($q){
            $q->where('categories.id', 2); // todo
        });
    }

    public function scopeSpecial($query)
    {
        $query->whereHas('groups', function ($q){
            $q->where('groups.id', 1); // todo
        });
    }

    public function scopeSuggestion($query)
    {
        $query->whereHas('groups', function ($q){
            $q->where('groups.id', 2); // todo
        });
    }

    public function hasActiveDiscount()
    {
        return !empty($this->discount_percentage);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
