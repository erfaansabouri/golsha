<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	protected $pageInfo = [
		'title' => 'تنظیمات',
	];

	public $search = '';
	public $category = '';

    public function mount($category)
    {
        $this->category = $category;
    }

	public function render()
	{
		$settings = Setting::query();
		if(!empty($this->search))
		{
			$settings = $settings->where('key', 'like', '%'. $this->search .'%');
		}

        if(!empty($this->category))
        {
            $settings = $settings->where('category',$this->category);
            $this->pageInfo['title'] = 'تنظیمات ' . Setting::translateCategories($this->category);
        }

		$settings = $settings->orderBy('id', 'asc')->paginate(200);
		return view('livewire.admin.settings.index', [
			'settings' => $settings,
		])->with('pageInfo', $this->pageInfo);
	}
}
