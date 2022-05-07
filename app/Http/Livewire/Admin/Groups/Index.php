<?php

namespace App\Http\Livewire\Admin\Groups;

use App\Models\Category;
use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'گروه ها',
    ];

    public $search = '';
    public function render()
    {
        $groups = Group::query();
        if(!empty($this->search))
        {
            $groups = $groups->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $groups = $groups->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.groups.index', [
            'groups' => $groups,
        ])->with('pageInfo', $this->pageInfo);
    }

    public function destroy($id)
    {
        Group::query()->findOrFail($id)->delete();
        session()->flash('message', 'گروه با موفقیت حذف شد.');
        redirect()->route('admin.groups.index');
    }
}
