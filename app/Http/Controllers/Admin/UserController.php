<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $pageInfo = [
        'title' => 'کاربران',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.users.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.users.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = User::query()->findOrFail($id);
        return view('admin-pages.users.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
