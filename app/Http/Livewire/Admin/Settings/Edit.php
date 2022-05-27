<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\BlogCategory;
use App\Models\CategoryPost;
use App\Models\Setting;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
	use WithFileUploads;
	
	protected $pageInfo = [
		'title' => 'ویرایش تنظیمات',
	];
	public $record;
	/* Form inputs */
	public $value;
	public $href;
	public $oldImage;
	public $image;

	
	
	
	public function mount($record)
	{
		$this->record = $record;
		if($record->type == Setting::TYPES['text'])
		{
			$this->value = $this->record->value;
		}
		if ($record->type == Setting::TYPES['image'])
		{
			$this->oldImage = $this->record->image_path;
			$this->href = $this->record->href;
		}

	}
	public function render()
	{
		return view('livewire.admin.settings.edit')->with('pageInfo', $this->pageInfo);
	}
	
	public function update()
	{
		
		if($this->record->type == Setting::TYPES['image'])
		{
			if($this->image)
			{
				$fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
				$imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
				$this->record->value = $imageName;
			}
			$this->record->href = $this->href;
			$this->record->save();
		}
		else{
			$this->record->value = $this->value;
			$this->record->save();
		}
		
		session()->flash('message', 'تنظیمات با موفقیت ویرایش شد.');
		redirect()->route('admin.settings.index');
	}
}
