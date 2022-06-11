<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
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

    public function index(Request $request)
	{
        $category = $request->category;
        $this->pageInfo['title'] = 'تنظیمات' . $category;
		return view('admin-pages.settings.index', compact('category'))->with('pageInfo', $this->pageInfo);
	}

	public function edit($id)
	{
		$record = Setting::query()->findOrFail($id);
		return view('admin-pages.settings.edit', compact('record'))->with('pageInfo', $this->pageInfo);
	}
}
