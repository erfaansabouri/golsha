<?php

namespace App\Http\Livewire;
use Livewire\Component;
class ContactUs extends Component
{

    public $fullName;
    public $phoneNumber;
    public $email;
    public $message;

    public function render()
    {
        return view('livewire.contact-us');
    }

    protected $rules = [
        'fullName' => 'required',
        'email' => 'nullable|email',
        'phoneNumber' => 'required|numeric',
        'message' => 'required',
    ];



    protected $messages = [
        'fullName.required' => 'نام اجباری است.',
        'email.required' => 'ایمیل اجباری است',
        'email.email' => 'فرمت ایمیل صحیح نمیباشد.',
        'phoneNumber.required' => 'شماره تماس اجباری است.',
        'message.required' => 'متن اجباری است.',
    ];

    public function store()
    {
        $this->validate();
        \App\Models\ContactUs::query()
            ->create([
                'full_name' => $this->fullName,
                'phone_number' => $this->phoneNumber,
                'email' => $this->email,
                'message' => $this->message,
            ]);
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'پیغام شما ثبت شد.']);
    }
}
