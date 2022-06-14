<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\Models\Category;
use App\Models\Faq;
use App\Models\FaqCategory;
use Livewire\Component;

class Edit extends Component
{
    public $record;
    public $question;
    public $answer;

    public function mount($record)
    {
        $this->record = $record;
        $this->question = $this->record->question;
        $this->answer = $this->record->answer;
    }

    public function render()
    {
        return view('livewire.admin.faqs.edit');
    }

    public function update($id)
    {
        $faq = Faq::query()
            ->findOrFail($id);
        $faq->update([
                'question' => $this->question,
                'answer' => $this->answer,
            ]);

        session()->flash('message', 'با موفقیت ویرایش شد.');
        redirect()->route('admin.faqs.index', ['category_id' => $faq->faq_category_id]);
    }
}
