<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    protected $pageInfo = [
        'title' => 'نظر ها',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.comments.index')->with('pageInfo', $this->pageInfo);
    }

}
