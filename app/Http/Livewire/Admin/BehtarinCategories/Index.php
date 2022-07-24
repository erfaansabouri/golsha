<?php

namespace App\Http\Livewire\Admin\BehtarinCategories;

use App\Models\BehtarinCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'دسته بندی محصولات غذایی بهترین',
    ];

    public $search = '';
    public function render()
    {
        $items = BehtarinCategory::query();
        if(!empty($this->search))
        {
            $items = $items->where('id', '=', $this->search);
        }
        $items = $items->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.behtarin-categories.index', [
            'items' => $items,
        ])->with('pageInfo', $this->pageInfo);
    }
}
