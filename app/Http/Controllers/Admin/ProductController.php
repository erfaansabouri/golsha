<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $pageInfo = [
        'title' => 'محصولات',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.products.index')->with('pageInfo', $this->pageInfo);
    }

	public function create()
	{
		return view('admin-pages.products.create')->with('pageInfo', $this->pageInfo);
	}

    public function edit($id)
    {
        $record = Product::query()->findOrFail($id);
        return view('admin-pages.products.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
