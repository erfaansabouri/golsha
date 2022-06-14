<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $pageInfo = [
        'title' => 'سوالات متداول',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $category_id = $request->category_id;
        return view('admin-pages.faqs.index', compact('category_id'))->with('pageInfo', $this->pageInfo);
    }

    public function create(Request $request)
    {
        $category_id = $request->category_id;
        return view('admin-pages.faqs.create', compact('category_id'))->with('pageInfo', $this->pageInfo);
    }

    public function edit(Request $request, $id)
    {
        $record = Faq::query()->findOrFail($id);
        $category_id = $request->category_id;
        return view('admin-pages.faqs.edit', compact('record', 'category_id'))->with('pageInfo', $this->pageInfo);
    }
}
