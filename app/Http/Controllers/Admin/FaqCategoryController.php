<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    protected $pageInfo = [
        'title' => 'دسته بندی سوالات متداول',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.faq-categories.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.faq-categories.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = FaqCategory::query()->findOrFail($id);
        return view('admin-pages.faq-categories.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
