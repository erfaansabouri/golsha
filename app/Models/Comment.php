<?php

namespace App\Models;

use DateTimeInterface;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $guarded = [];


    public function getVerifiedStatusAttribute()
    {
        return $this->verified_at ?
            'تایید شده' : 'در انتظار تایید';
    }

    public function getVerifiedBadgeAttribute()
    {
        return $this->verified_at ?
            'badge-success' : 'badge-warning';
    }

    public function getCreatedAtJalaliAttribute()
    {
        return Verta::instance($this->created_at)
            ->format('Y-m-d H:i:s');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function answer()
    {
        return $this->hasOne(Comment::class, 'parent_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMorphTypeAttribute()
    {
        return 'محصول';
    }
}
