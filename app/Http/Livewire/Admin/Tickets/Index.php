<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Comment;
use App\Models\ContactUs;
use App\Models\Ticket;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'درخواست های پشتیبانی',
    ];

    public $search = '';
    public function render()
    {
        $tickets = ContactUs::query();
        if(!empty($this->search))
        {
            $tickets = $tickets->where('id', '=', $this->search);
        }
        $tickets = $tickets->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.tickets.index', [
            'tickets' => $tickets,
        ])->with('pageInfo', $this->pageInfo);
    }
}
