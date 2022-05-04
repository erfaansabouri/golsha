<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class Index extends Component
{
	protected $pageInfo = [
		'title' => 'داشبورد',
	];
	
    public function render()
    {
        return view('livewire.admin.dashboard.index')->with('pageInfo', $this->pageInfo);
    }
}
