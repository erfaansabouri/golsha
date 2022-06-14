<?php

namespace App\Http\Livewire\Admin\FaqCategories;

use App\Models\Category;
use App\Models\FaqCategory;
use Livewire\Component;

class Create extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.admin.faq-categories.create');
    }

    public function store()
    {
        FaqCategory::query()
            ->create([
                'title' => $this->title
            ]);

        session()->flash('message', 'دسته بندی با موفقیت ایجاد شد.');
        redirect()->route('admin.faq-categories.index');
    }
}
