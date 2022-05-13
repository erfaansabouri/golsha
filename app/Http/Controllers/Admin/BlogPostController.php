<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    protected $pageInfo = [
        'title' => 'بلاگ',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.blog-posts.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.blog-posts.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = BlogPost::query()->findOrFail($id);
        return view('admin-pages.blog-posts.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
