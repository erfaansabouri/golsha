<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function upload(Request $request)
	{
		$fileName = Str::random(16). '.' . $request->file('file')->getClientOriginalName();
		$imageName = $request->file('file')->storeAs('images', $fileName, 'parswebserver');
		return response()->json(['location'=>"/storage/$imageName"]);
		
		/*$imgpath = request()->file('file')->store('uploads', 'public');
		return response()->json(['location' => "/storage/$imgpath"]);*/
		
	}
}
