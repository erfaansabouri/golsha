<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.admin.categories.create');
    }

    public function store()
    {
        Category::query()
            ->create([
                'title' => $this->title
            ]);

        session()->flash('message', 'دسته بندی با موفقیت ایجاد شد.');
        redirect()->route('admin.categories.index');
    }
}
