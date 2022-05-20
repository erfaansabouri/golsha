<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DissatisfactionController extends Controller
{
	protected $pageInfo = [
		'title' => 'ثبت نارضایتی',
	];
	public function index()
	{
		return view('front-pages.contact-us.index', [
			'formType' => 'ثبت نارضایتی'
		])->with('pageInfo', $this->pageInfo);
    }
}
