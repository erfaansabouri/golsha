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
	public function render()
	{
		$settings = Setting::query();
		if(!empty($this->search))
		{
			$settings = $settings->where('key', 'like', '%'. $this->search .'%');
		}
		
		$settings = $settings->orderBy('id', 'desc')->paginate(25);
		return view('livewire.admin.settings.index', [
			'settings' => $settings,
		])->with('pageInfo', $this->pageInfo);
	}
}
