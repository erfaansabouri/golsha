<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'دسته بندی ها',
    ];

    public $search = '';
    public function render()
    {
        $categories = Category::query();
        if(!empty($this->search))
        {
            $categories = $categories->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $categories = $categories->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.categories.index', [
            'categories' => $categories,
        ])->with('pageInfo', $this->pageInfo);
    }

    public function destroy($id)
    {
        Category::query()->findOrFail($id)->delete();
        session()->flash('message', 'دسته بندی با موفقیت حذف شد.');
        redirect()->route('admin.categories.index');
    }
}
