<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
	protected $pageInfo = [
		'title' => 'پشتیبانی',
	];
	public function index()
	{
		return view('front-pages.contact-us.index', [
			'formType' => 'پشتیبانی'
		])->with('pageInfo', $this->pageInfo);
    }
}
