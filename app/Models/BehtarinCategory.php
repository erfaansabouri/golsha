<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BehtarinCategory extends Model
{
    protected $guarded = [];

    public function getImagePathAttribute()
    {
        if($this->image_name)
            return getenv('APP_URL'). "/storage/". $this->image_name;
        return null;
    }
}
