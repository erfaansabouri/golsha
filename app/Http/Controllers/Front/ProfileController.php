<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function details()
    {
        $user = Auth::user();
        return view('front-pages.profile.details', compact('user'));
    }

    public function updateDetails(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'bank_card' => $request->bank_card,
        ]);
        return redirect()->route('user.profile.details');
    }

    public function destroyAddress($id)
    {
        $user = Auth::user();
        $address = Address::query()->findOrFail($id);
        if($user->id == $address->user_id)
        {
            $address->delete();
        }
        return redirect()->route('user.profile.details');
    }


    public function storeAddress(Request $request)
    {
        $user = Auth::user();
        Address::query()->create([
            'user_id' => $user->id,
            'receiver_name' => $request->receiver_name,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'first_line' => $request->first_line,
            'second_line' => $request->second_line,
        ]);
        return redirect()->route('user.profile.details');
    }

    public function updateAddress(Request $request, $id)
    {
        $user = Auth::user();
        Address::query()->where('id', $id)->update([
            'user_id' => $user->id,
            'receiver_name' => $request->receiver_name,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'first_line' => $request->first_line,
            'second_line' => $request->second_line,
        ]);
        return redirect()->route('user.profile.details');
    }
}
