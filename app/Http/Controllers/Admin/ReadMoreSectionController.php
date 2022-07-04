<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ReadMoreSection;

class ReadMoreSectionController extends Controller
{
    protected $pageInfo = [
        'title' => 'بیشتر بدانید ها',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.read-more-sections.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.read-more-sections.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = ReadMoreSection::query()->findOrFail($id);
        return view('admin-pages.read-more-sections.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }

    public function destroy($id)
    {
        $record = ReadMoreSection::query()->findOrFail($id);
        $record->delete();
        return redirect()->route('admin.read-more-sections.index')->with('message', 'تغییرات با موفقیت ثبت شد.');

    }
}
