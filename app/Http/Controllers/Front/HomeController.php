<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
	{
		$sliders = Setting::query()
            ->where('category', Setting::CATEGORIES['sliders'])
            ->get();

		$mostSold = Product::mostSold()->latest()->take(8)->get();
        $suggestionProducts = Product::suggestion()->latest()->take(8)->get();
        $twoRandomProducts = Product::query()->inRandomOrder()->take(2)->get();
        $benooshProducts = Product::query()->inRandomOrder()->take(8)->get();
		return view('front-pages.home.index', compact('sliders', 'mostSold', 'suggestionProducts', 'twoRandomProducts', 'benooshProducts'));
	}
}
