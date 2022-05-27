<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
	protected $pageInfo = [
		'title' => 'تنظیمات',
	];
	
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	
    public function index()
	{
		return view('admin-pages.settings.index')->with('pageInfo', $this->pageInfo);
	}
}
