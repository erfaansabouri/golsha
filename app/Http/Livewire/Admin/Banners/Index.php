<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Models\Banner;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'بنر ها',
    ];

    public $search = '';
    public function render()
    {
        $banners = Banner::query();
        if(!empty($this->search))
        {
            $banners = $banners->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $banners = $banners->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.banners.index', [
            'banners' => $banners,
        ])->with('pageInfo', $this->pageInfo);
    }
}
