<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BehtarinCategory;

class BehtarinCategoryController extends Controller
{
    protected $pageInfo = [
        'title' => 'دسته بندی گروه غذایی بهترین',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.behtarin-categories.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.behtarin-categories.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = BehtarinCategory::query()->findOrFail($id);
        return view('admin-pages.behtarin-categories.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }

    public function destroy($id)
    {
        $record = BehtarinCategory::query()->findOrFail($id);
        $record->delete();
        return redirect()->route('admin.behtarin-categories.index')->with('message', 'تغییرات با موفقیت ثبت شد.');

    }
}
