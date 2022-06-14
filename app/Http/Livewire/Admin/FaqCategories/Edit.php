<?php

namespace App\Http\Livewire\Admin\FaqCategories;

use App\Models\Category;
use App\Models\FaqCategory;
use Livewire\Component;

class Edit extends Component
{
    public $record;
    public $title;

    public function mount($record)
    {
        $this->record = $record;
        $this->title = $this->record->title;
    }

    public function render()
    {
        return view('livewire.admin.faq-categories.edit');
    }

    public function update($id)
    {
        FaqCategory::query()
            ->findOrFail($id)
            ->update([
                'title' => $this->title,
            ]);

        session()->flash('message', 'دسته بندی با موفقیت ویرایش شد.');
        redirect()->route('admin.faq-categories.index');
    }
}
