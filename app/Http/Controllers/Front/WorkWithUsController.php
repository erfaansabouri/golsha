<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkWithUsController extends Controller
{
	protected $pageInfo = [
		'title' => 'همکاری با ما',
	];
	public function index()
	{
		return view('front-pages.contact-us.index', [
			'formType' => 'همکاری با ما'
		])->with('pageInfo', $this->pageInfo);
    }
}
