<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['remember_token'];

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getShamsiBirthdayAttribute()
    {
        if($this->birthday)
            return Verta::instance($this->birthday)->format('Y-n-j');;
        return null;
    }
}
