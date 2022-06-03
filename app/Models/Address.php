<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    protected $table = 'addresses';
    protected $guarded = [];

    use SoftDeletes;

    public function getFullAttribute()
    {
        return $this->country.' '.$this->state.' '.$this->city.' '.$this->first_line.' '.$this->second_line;
    }
}
