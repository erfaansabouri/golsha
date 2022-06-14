<?php

namespace App\Http\Livewire\Admin\Admins;

use App\Models\Admin;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component {
	use WithFileUploads;

	protected $pageInfo = [
		'title' => 'ایجاد ادمین' ,
	];
	public $record;
	public $full_name;
	public $email;
	public $password;


	public function render () {
		return view('livewire.admin.admins.create')->with('pageInfo', $this->pageInfo);
	}

	public function update ( ) {
		$admin = new Admin();
        $admin->full_name = $this->full_name;
        $admin->email = $this->email;
        $admin->is_super = 0;
        if(!empty($this->password))
            $admin->password = bcrypt($this->password);
        $admin->save();
		session()->flash('message' , 'ادمین با موفقیت ایجاد شد.');
		redirect()->route('admin.admins.index');
	}
}
