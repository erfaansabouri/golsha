<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\Models\Category;
use App\Models\Faq;
use App\Models\FaqCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'سوالات متداول',
    ];

    public $category_id;
    public $search = '';

    public function mount($category_id)
    {
        $this->category_id = $category_id;
    }


    public function render()
    {
        $faqs = Faq::query()->where('faq_category_id', $this->category_id);
        if(!empty($this->search))
        {
            $faqs = $faqs->where('id', '=', $this->search);
        }
        $faqs = $faqs->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.faqs.index', [
            'faqs' => $faqs,
        ])->with('pageInfo', $this->pageInfo);
    }

    public function destroy($id)
    {
        Faq::query()->findOrFail($id)->delete();
        session()->flash('message', 'با موفقیت حذف شد.');
        redirect()->route('admin.faqs.index');
    }
}
