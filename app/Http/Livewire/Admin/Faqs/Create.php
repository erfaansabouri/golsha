<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\Models\Category;
use App\Models\Faq;
use App\Models\FaqCategory;
use Livewire\Component;

class Create extends Component
{
    public $question;
    public $answer;
    public $category_id;


    public function mount($category_id)
    {
        $this->category_id = $category_id;
    }
    public function render()
    {
        return view('livewire.admin.faqs.create');
    }

    public function store()
    {
        Faq::query()
            ->create([
                'question' => $this->question,
                'answer' => $this->answer,
                'faq_category_id' => $this->category_id,
            ]);

        session()->flash('message', 'با موفقیت ایجاد شد.');
        redirect()->route('admin.faqs.index', ['category_id' => $this->category_id]);
    }
}
