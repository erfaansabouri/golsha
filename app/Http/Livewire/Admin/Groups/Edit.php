<?php

namespace App\Http\Livewire\Admin\Groups;

use App\Models\Category;
use App\Models\Group;
use Livewire\Component;

class Edit extends Component
{
    public $record;
    public $title;

    public function mount($record)
    {
        $this->record = $record;
        $this->title = $this->record->title;
    }

    public function render()
    {
        return view('livewire.admin.groups.edit');
    }

    public function update($id)
    {
        Group::query()
            ->findOrFail($id)
            ->update([
                'title' => $this->title,
            ]);

        session()->flash('message', 'گروه با موفقیت ویرایش شد.');
        redirect()->route('admin.groups.index');
    }
}
