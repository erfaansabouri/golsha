<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
	protected $pageInfo = [
		'title' => 'سوالات متداول',
	];
	public function index()
	{
		return view('front-pages.faq.index')->with('pageInfo', $this->pageInfo);
	}
}
