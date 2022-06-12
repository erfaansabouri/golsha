<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';
    protected $guarded = [];

    public function getCreatedAtJalaliAttribute()
    {
        return Verta::instance($this->created_at)
            ->format('Y-m-d H:i:s');
    }
}
