<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function savedProducts()
    {
        $user = Auth::user();
        $userSavedProducts = DB::table('user_saved_products')
            ->where('user_id', $user->id)
            ->get()->pluck('product_id');
        $products = Product::query()->whereIn('id', $userSavedProducts)->get();
        return view('front-pages.profile.saved-products', compact('user', 'products'));

    }

    public function destroySavedProduct($id)
    {
        $user = Auth::user();
        DB::table('user_saved_products')
            ->where('user_id', $user->id)
            ->where('product_id', $id)
            ->delete();
        return redirect()->route('user.profile.saved-products');
    }

    public function comments()
    {
        $user = Auth::user();
        $comments = Comment::query()
            ->where('user_id', $user->id)
            ->with('answer')
            ->get();
        return view('front-pages.profile.comments', compact('user', 'comments'));
    }
}
