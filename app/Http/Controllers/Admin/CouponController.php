<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $pageInfo = [
        'title' => 'کوپون های تخفیف',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.coupons.index')->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.coupons.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = Coupon::query()->findOrFail($id);
        return view('admin-pages.coupons.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
