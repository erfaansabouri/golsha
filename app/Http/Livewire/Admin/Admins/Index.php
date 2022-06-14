<?php

namespace App\Http\Livewire\Admin\Admins;


use App\Models\Admin;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'ادمین ها',
    ];

    public $search = '';
    public function render()
    {
        $admins = Admin::query()->where('is_enable', 1);
        if(!empty($this->search))
        {
            $admins = $admins->where('full_name', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $admins = $admins->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.admins.index', [
            'admins' => $admins,
        ])->with('pageInfo', $this->pageInfo);
    }
}
