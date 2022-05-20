<?php

namespace App\Http\Livewire\Front\ContactUs;

use App\Models\ContactUs;
use Livewire\Component;

class Create extends Component
{
	public $fullName;
	public $phoneNumber;
	public $email;
	public $message;
	public $formType = 'تماس با ما';
	
    public function render()
    {
        return view('livewire.front.contact-us.create');
    }
	
	public function mount($formType)
	{
		$this->formType = $formType;
	}
	
	public function store()
	{
		$this->validate(
			
			[
				'fullName' => 'required',
				'phoneNumber' => 'required',
				'message' => 'required',
			],
			
			[
				
				'fullName.required' => 'نام اجباری است.',
				'phoneNumber.required' => 'شماره تماس اجباری است.',
				'message.required' => 'متن پیام اجباری است.',
			],
			
		);
		ContactUs::query()
			->create([
				'full_name' => $this->fullName,
				'phone_number' => $this->phoneNumber,
				'email' => $this->email,
				'message' => $this->message,
				'type' => $this->formType,
			]);
		session()->flash('message', 'پیام شما با موفقیت ارسال شد.');
		if($this->formType == 'تماس با ما')
			redirect()->route('contact-us.index');
		if($this->formType == 'همکاری با ما')
			redirect()->route('work-with-us.index');
		if($this->formType == 'ثبت نارضایتی')
			redirect()->route('dissatisfaction.index');
		if($this->formType == 'پشتیبانی')
			redirect()->route('support.index');
	}
}
