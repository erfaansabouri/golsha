<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
	protected $pageInfo = [
		'title' => 'دریاره ما',
	];
	public function index()
	{
		return view('front-pages.about-us.index')->with('pageInfo', $this->pageInfo);
	}
}
