<?php

namespace App\Http\Livewire\Admin\Groups;

use App\Models\Category;
use App\Models\Group;
use Livewire\Component;

class Create extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.admin.groups.create');
    }

    public function store()
    {
        Group::query()
            ->create([
                'title' => $this->title
            ]);

        session()->flash('message', 'گروه با موفقیت ایجاد شد.');
        redirect()->route('admin.groups.index');
    }
}
