<?php

namespace App\Http\Livewire\Admin\FaqCategories;

use App\Models\Category;
use App\Models\FaqCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'دسته بندی سوالات متداول',
    ];

    public $search = '';
    public function render()
    {
        $categories = FaqCategory::query();
        if(!empty($this->search))
        {
            $categories = $categories->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $categories = $categories->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.faq-categories.index', [
            'faq_categories' => $categories,
        ])->with('pageInfo', $this->pageInfo);
    }

    public function destroy($id)
    {
        FaqCategory::query()->findOrFail($id)->delete();
        session()->flash('message', 'دسته بندی با موفقیت حذف شد.');
        redirect()->route('admin.faq-categories.index');
    }
}
