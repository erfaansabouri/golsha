<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $pageInfo = [
        'title' => 'بنر ها',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.banners.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.banners.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = Banner::query()->findOrFail($id);
        return view('admin-pages.banners.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
