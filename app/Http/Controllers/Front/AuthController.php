<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
	{
		return view('front-pages.auth.login');
	}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

	public function sendOTP(Request $request)
	{
        $request->validate([
            'phone_number' => ['required', 'numeric', 'regex:'. User::IRAN_PHONE_NUMBER_REGEX],
        ]);

		$user = User::sendOTP($request->phone_number);
		return redirect()->route('user.auth.OTPForm',[
		    'id' => encrypt($user->id),
        ]);
	}

    public function OTPForm($id)
    {
        $user = User::query()->findOrFail(decrypt($id));
        return view('front-pages.auth.otp', compact('user'));
    }

    public function validateOTPAndLogin(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'numeric'],
            'user_id' => ['required'],
        ]);
        $user = User::query()->findOrFail($request->user_id);
        if($user->otp == $request->otp)
        {
            Auth::login($user);
            return redirect()->route('user.profile.details');
        }
        return redirect()->route('user.auth.OTPForm',[
            'id' => encrypt($user->id),
        ])->withErrors([
            'err' => 'رمز ورود نادرست است.'
        ]);
    }
}
