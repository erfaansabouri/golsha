<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $pageInfo = [
        'title' => 'ادمین ها',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.admins.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.admins.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = Admin::query()->findOrFail($id);
        return view('admin-pages.admins.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }

    public function disable($id)
    {
        $record = Admin::query()->findOrFail($id);
        if($record->is_super) {
            return redirect()->back()->with('message', 'ادمین اصلی قابل حذف نیست.');
        }
        $record->is_enable = 0;
        $record->save();
        return redirect()->back()->with('message', 'ادمین با موفقیت غیرفعال شد.');
    }
}
