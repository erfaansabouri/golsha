<?php

namespace App\Http\Livewire\Admin\ReadMoreSections;

use App\Models\BlogPost;
use App\Models\ReadMoreSection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'بیشتر بدانید های صفحه اصلی',
    ];

    public $search = '';
    public function render()
    {
        $items = ReadMoreSection::query();
        if(!empty($this->search))
        {
            $items = $items->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $items = $items->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.read-more-sections.index', [
            'read_more_sections' => $items,
        ])->with('pageInfo', $this->pageInfo);
    }
}
