<?php

namespace App\Http\Livewire\Front\Faq;

use App\Models\FaqCategory;
use Livewire\Component;

class Index extends Component
{
	public $searchText;
	protected $queryString = ['searchText'];
    public function render()
    {
		$faqCategories = FaqCategory::query();
		$search = $this->searchText;
		if(!empty($search))
		{
			$faqCategories->whereHas('faqs', function ($q) use($search){
				$q->where('faqs.question', 'like', '%'. $search .'%');
			});
		}
		
        return view('livewire.front.faq.index', [
			'faqCategories' => $faqCategories->get(),
		]);
    }
	
}
