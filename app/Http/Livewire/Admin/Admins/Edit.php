<?php

namespace App\Http\Livewire\Admin\Admins;

use App\Models\Admin;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component {
	use WithFileUploads;

	protected $pageInfo = [
		'title' => 'ویرایش ادمین' ,
	];
	public $record;
	public $full_name;
	public $email;
	public $password;

	public function mount ( $record ) {
		$this->record = $record;
		$this->full_name = $record->full_name;
		$this->email = $record->email;
	}

	public function render () {
		return view('livewire.admin.admins.edit')->with('pageInfo', $this->pageInfo);
	}

	public function update ( $id ) {
		$admin = Admin::query()
					->findOrFail($id);
        $admin->full_name = $this->full_name;
        $admin->email = $this->email;
        if(!empty($this->password))
            $admin->password = bcrypt($this->password);
        $admin->save();
		session()->flash('message' , 'ادمین با موفقیت ویرایش شد.');
		redirect()->route('admin.admins.index');
	}
}
