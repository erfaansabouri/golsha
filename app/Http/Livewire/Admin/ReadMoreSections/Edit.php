<?php

namespace App\Http\Livewire\Admin\ReadMoreSections;

use App\Models\BlogCategory;
use App\Models\CategoryPost;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    protected $pageInfo = [
        'title' => 'ویرایش بیشتر بدانید',
    ];
    public $record;
    /* Form inputs */
    public $title;
    public $body;
    public $image;
    public $href;



	public function mount($record)
    {
        $this->record 		= $record;
        $this->title 		= $this->record->title;
        $this->body 		= $this->record->body;
        $this->oldImage 	= $this->record->imagePath;
        $this->href 	= $this->record->href;

        return view('livewire.admin.read-more-sections.edit')->with('pageInfo', $this->pageInfo);
    }

    public function update()
    {
        $this->record->title 	= $this->title;
        $this->record->body 	= $this->body;
        $this->record->href 	= $this->href;
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $this->record->image_name = $imageName;
        }
        $this->record->save();


        session()->flash('message', 'پست با موفقیت ویرایش شد.');
        redirect()->route('admin.read-more-sections.index');
    }
}
