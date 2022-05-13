<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';
    protected $guarded = [];

    public function getImagePathAttribute()
    {
        if($this->image_name)
            return getenv('APP_URL'). "/storage/". $this->image_name;
        return null;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
