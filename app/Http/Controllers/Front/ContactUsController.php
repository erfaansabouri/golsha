<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
	protected $pageInfo = [
		'title' => 'تماس با ما',
	];
	public function index()
	{
		return view('front-pages.contact-us.index', [
			'formType' => 'تماس با ما'
		])->with('pageInfo', $this->pageInfo);
    }
}
