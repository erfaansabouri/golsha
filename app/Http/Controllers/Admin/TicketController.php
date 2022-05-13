<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    protected $pageInfo = [
        'title' => 'در خواست های پشتیبانی',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin-pages.tickets.index')->with('pageInfo', $this->pageInfo);
    }

}
