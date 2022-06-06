<?php

namespace App\Http\Livewire\Admin\Invoices;

use App\Models\Invoice;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'سفارش ها',
    ];

    public $search = '';
    public $status = '';

    public function mount($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        $invoices = Invoice::query();
        if(!empty($this->search))
        {
            $invoices = $invoices->where('id', '=', $this->search);
        }
        if(!empty($this->status))
        {
            $invoices = $invoices->where('status', '=', Invoice::STATUSES[$this->status]);
        }
        $invoices = $invoices->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.invoices.index', [
            'invoices' => $invoices,
        ])->with('pageInfo', $this->pageInfo);
    }
}
