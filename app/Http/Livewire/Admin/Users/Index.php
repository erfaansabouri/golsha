<?php

namespace App\Http\Livewire\Admin\Users;


use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'کاربران',
    ];

    public $search = '';
    public function render()
    {
        $users = User::query();
        if(!empty($this->search))
        {
            $users = $users->where('first_name', 'like', '%'. $this->search .'%')
                ->orWhere('last_name', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $users = $users->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.users.index', [
            'users' => $users,
        ])->with('pageInfo', $this->pageInfo);
    }
}
