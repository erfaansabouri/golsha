<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $pageInfo = [
        'title' => 'دسته بندی ها',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.categories.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.categories.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = Category::query()->findOrFail($id);
        return view('admin-pages.categories.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
