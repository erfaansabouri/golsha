<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
	protected $guarded = [];

	const TYPES = [
		'image' => 'image',
		'text' => 'text',
	];

	const CATEGORIES = [
		'about-us' => 'about-us',
		'footer' => 'footer',
		'socials' => 'socials',
		'blog' => 'blog',
        'sliders' => 'sliders',
        'under-sliders' => 'under-sliders',
        'product-banner' => 'product-banner',
	];

	public static function translateCategories($category)
	{
		switch ($category){
			case self::CATEGORIES['about-us']:
				return 'درباره ما';
			case self::CATEGORIES['footer']:
				return 'فوتر';
			case self::CATEGORIES['socials']:
				return 'شبکه های اجتماعی';
			case self::CATEGORIES['blog']:
				return 'بلاگ';
            case self::CATEGORIES['sliders']:
                return 'اسلایدر';
            case self::CATEGORIES['under-sliders']:
                return 'محصولات زیر اسلایدر';
            case self::CATEGORIES['product-banner']:
                return 'بنر های صفحه محصولات';
		}
	}

	public static function translateType($type)
	{
		switch ($type){
			case self::TYPES['image']:
				return 'تصویر';
			case self::TYPES['text']:
				return 'متن';
		}
	}

	public function findByKey($key)
	{
		$model = self::query()
			->where('key', $key)
			->first();

		if($model)
		{
			if ($model->type == self::TYPES['image'])
			{
				return $model->image_path;
			}

			if ($model->type == self::TYPES['text'])
			{
				return $model->value;
			}
		}

		return '-';
	}

	public function getHrefByKey($key)
	{
		$model = self::query()
					 ->where('key', $key)
					 ->first();

		if($model)
		{
			return $model->href;
		}

		return '-';
	}

	public function getValuePreviewAttribute()
	{
		if ($this->type == self::TYPES['image'])
		{
			return $this->image_path;
		}

		if ($this->type == self::TYPES['text'])
		{
			return $this->value;
		}
		return '-';
	}

	public function getImagePathAttribute()
	{
		return getenv('APP_URL'). "/storage/". $this->value;
	}
}
