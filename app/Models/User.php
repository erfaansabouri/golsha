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
    const IRAN_PHONE_NUMBER_REGEX = "/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/";


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

    public static function sendOTP($phoneNumber)
	{
		$otp = rand(100000,999999);
		$user = User::query()->updateOrCreate(
		[
			'phone_number' => $phoneNumber,
		],
		[
			'otp' => $otp,
		]);

		// TODO : send sms

		return $user;
	}

	public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
