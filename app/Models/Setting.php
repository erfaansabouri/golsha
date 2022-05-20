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
	
	public function getImagePathAttribute()
	{
		return getenv('APP_URL'). "/storage/". $this->value;
	}
}
