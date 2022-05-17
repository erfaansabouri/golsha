<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component {
	use WithFileUploads;
	
	protected $pageInfo = [
		'title' => 'ویرایش کاربر' ,
	];
	public $record;
	/* Model columns */
	public $firstName;
	public $lastName;
	public $phoneNumber;
	public $sex;
	public $email;
	public $password = null;
	public $isDisable;
	
	public function mount ( $record ) {
		$this->record = $record;
		$this->firstName = $record->first_name;
		$this->lastName = $record->last_name;
		$this->phoneNumber = $record->phone_number;
		$this->sex = $record->sex;
		$this->email = $record->email;
		$this->isDisable = $record->is_disable;
	}
	
	public function render () {
		return view('livewire.admin.users.edit')->with('pageInfo', $this->pageInfo);
	}
	
	public function update ( $id ) {
		$user = User::query()
					->findOrFail($id);
		$user->first_name = $this->firstName;
		$user->last_name = $this->lastName;
		$user->phone_number = $this->phoneNumber;
		$user->sex = $this->sex;
		$user->email = $this->email;
		$user->save();
		session()->flash('message' , 'کاربر با موفقیت ویرایش شد.');
		redirect()->route('admin.users.index');
	}
	
	public function updatePassword ( $id ) {
		$this->validate(
			['password' => 'required'],
			[
				'password.required' => ':attribute الزامی است.',
			],
			['password' => 'رمز عبور']
		);
		$user = User::query()
					->findOrFail($id);
		$user->password = bcrypt($this->password);
		$user->save();
		session()->flash('message' , 'پسورد کاربر با موفقیت ویرایش شد.');
		redirect()->route('admin.users.index');
	}
	
	public function toggleIsDisable($id)
	{
		$user = User::query()
					->findOrFail($id);
		$user->is_disable = $user->is_disable ? false : true;
		$user->save();
		session()->flash('message' , 'کاربر با موفقیت ویرایش شد.');
		redirect()->route('admin.users.edit', $id);
	}
}
