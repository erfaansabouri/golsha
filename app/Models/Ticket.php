<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $guarded = [];

    public function getCreatedAtJalaliAttribute()
    {
        return Verta::instance($this->created_at)
            ->format('Y-m-d H:i:s');
    }
}
