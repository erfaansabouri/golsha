<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use IPPanel\Client;
use SoapClient;

class User extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['remember_token'];
    const IRAN_PHONE_NUMBER_REGEX = "/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/";

    public static function sendSms($receiverPhones, $message)
    {
        $client = new Client(getenv('FARAZ_SMS_TOKEN'));
        $bulkID = $client->send(
            "+983000505",          // originator
            $receiverPhones,    // recipients
            $message // message
        );
        return $client->getCredit();
    }


    public static function sendOTPSMS($phoneNumber, $otp)
    {
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = "09189189329";
        $pass = "3360317671";
        $fromNum = "+983000505";
        $toNum = array($phoneNumber);
        $pattern_code = "7xesn7g8hlqqjd4";
        $input_data = array(
            "vc" => $otp,
        );
        echo $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }

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

		self::sendOTPSMS($phoneNumber, $otp);

		return $user;
	}

	public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
