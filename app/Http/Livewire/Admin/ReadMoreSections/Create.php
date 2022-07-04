<?php

namespace App\Http\Livewire\Admin\ReadMoreSections;

use App\Models\ReadMoreSection;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected $pageInfo = [
        'title' => 'ایجاد بیشتر بدانید',
    ];
    public $record;
    /* Form inputs */
    public $title;
    public $body;
    public $image;
    public $href;

	public function mount()
	{

	}

    public function render()
    {
        return view('livewire.admin.read-more-sections.create')->with('pageInfo', $this->pageInfo);
    }

    public function update()
    {
        $model = new ReadMoreSection();
        $model->title = $this->title;
        $model->body = $this->body;
        $model->href = $this->href;
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $model->image_name = $imageName;
        }
        $model->save();

        session()->flash('message', 'پست با موفقیت ایجاد شد.');
        redirect()->route('admin.read-more-sections.index');
    }
}
