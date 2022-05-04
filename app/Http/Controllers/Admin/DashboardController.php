<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	protected $pageInfo = [
		'title' => 'داشبورد',
	];
	
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	
    public function index()
	{
		return view('admin-pages.dashboard.index')->with('pageInfo', $this->pageInfo);
	}
}
