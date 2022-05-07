<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $pageInfo = [
        'title' => 'گروه ها',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.groups.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.groups.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = Group::query()->findOrFail($id);
        return view('admin-pages.groups.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
