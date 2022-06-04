<?php

namespace App\Http\Livewire\Admin\Groups;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $record;
    public $title;
    public $description;
    public $oldImage;
    public $image;

    public function mount($record)
    {
        $this->record = $record;
        $this->title = $this->record->title;
        $this->description = $this->record->description;
        $this->oldImage 	= $this->record->imagePath;

    }

    public function render()
    {
        return view('livewire.admin.groups.edit');
    }

    public function update($id)
    {
        $record = Group::query()
            ->findOrFail($id);

        $record->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $record->image_name = $imageName;
            $record->save();
        }

        session()->flash('message', 'گروه با موفقیت ویرایش شد.');
        redirect()->route('admin.groups.index');
    }
}
