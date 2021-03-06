<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'product_images';
    protected $guarded = [];
    use HasFactory;

    public function getPathAttribute()
    {
        return getenv('APP_URL'). "/storage/". $this->name;
    }

}
