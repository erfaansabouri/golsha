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

	public function getHumanReadableCreatedAttribute()
	{
		if($this->image_name)
			return getenv('APP_URL'). "/storage/". $this->image_name;
		return null;
	}

	public function getTagsArrayAttribute()
	{
		return explode('،',$this->tags);
	}
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

	public function relatedBlogPosts()
	{
		return $this->hasMany(BlogPost::class,'id','id'); // TODO
	}

	/* SCOPES */
	public function scopeTopI($query)
	{
		return $query->where('top_order', 1)->orderBy('updated_at', 'desc')->take(1);
	}
	public function scopeTopII($query)
	{
		return $query->where('top_order', 2)->orderBy('updated_at', 'desc')->take(1);
	}
	public function scopeTopIII($query)
	{
		return $query->where('top_order', 3)->orderBy('updated_at', 'desc')->take(1);
	}
	public function scopeTopIV($query)
	{
		return $query->where('top_order', 4)->orderBy('updated_at', 'desc')->take(1);
	}
	public function scopeSelectedEditor($query)
	{
		return $query->where('is_editor_selected', 1)->inRandomOrder()->take(5);
	}
	public function scopePopular($query)
	{
		return $query->where('is_popular', 1)->inRandomOrder()->take(5);
	}
	public function scopeNews($query)
	{
		return $query->where('is_news', 1)->inRandomOrder()->take(5);
	}

    public static function scopeSimilars($query)
    {
        return $query->inRandomOrder()->take(5);
    }
}
