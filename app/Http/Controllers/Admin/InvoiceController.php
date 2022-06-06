<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $pageInfo = [
        'title' => 'سفارش ها',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $status = $request->status;
        return view('admin-pages.invoices.index', compact('status'))->with('pageInfo', $this->pageInfo);
    }

    public function create()
    {
        return view('admin-pages.invoices.create')->with('pageInfo', $this->pageInfo);
    }

    public function edit($id)
    {
        $record = Invoice::query()->findOrFail($id);
        return view('admin-pages.invoices.edit', compact('record'))->with('pageInfo', $this->pageInfo);
    }

    public function show($id)
    {
        $record = Invoice::query()->findOrFail($id);
        return view('admin-pages.invoices.show', compact('record'))->with('pageInfo', $this->pageInfo);
    }

    public function accept($id)
    {
        $record = Invoice::query()->findOrFail($id);
        $record->status = Invoice::STATUSES['done'];
        $record->save();
        return view('admin-pages.invoices.show', compact('record'))->with('pageInfo', $this->pageInfo);
    }

    public function cancel($id)
    {
        $record = Invoice::query()->findOrFail($id);
        $record->status = Invoice::STATUSES['canceled'];
        $record->save();
        return view('admin-pages.invoices.show', compact('record'))->with('pageInfo', $this->pageInfo);
    }
}
