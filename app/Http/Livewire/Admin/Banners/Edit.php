<?php

namespace App\Http\Livewire\Admin\Banners;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    protected $pageInfo = [
        'title' => 'ویرایش بنر',
    ];
    public $record;
    /* Form inputs */
    public $title;
    public $oldImage;
    public $image;


    public function mount($record)
    {
        $this->record = $record;
        $this->title = $this->record->title;
        $this->oldImage = $this->record->imagePath;
    }
    public function render()
    {
        return view('livewire.admin.banners.edit');
    }

    public function update()
    {
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $this->record->image_name = $imageName;
            $this->record->save();
        }
        session()->flash('message', 'بنر با موفقیت ویرایش شد.');
        redirect()->route('admin.banners.index');
    }
}
