<?php

namespace App\Http\Livewire\Admin\Groups;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $image;

    public function render()
    {
        return view('livewire.admin.groups.create');
    }

    public function store()
    {
        $record = Group::query()
            ->create([
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

        session()->flash('message', 'گروه با موفقیت ایجاد شد.');
        redirect()->route('admin.groups.index');
    }
}
