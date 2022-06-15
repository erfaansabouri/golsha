<?php

namespace App\Http\Livewire\Front\Footer;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubscribeForm extends Component
{
    public $email;
    public $result;

    public function render()
    {
        return view('livewire.front.footer.subscribe-form');
    }


    public function do()
    {
        $this->validate([
            'email' => ['required', 'email']
        ],[
            'email.required' => 'ایمیل اجباری است',
            'email.email' => 'فرمت اشتباه است',
        ]);

        $model = DB::table('subscribes')
            ->where('email', $this->email)
            ->first();

        if($model)
        {
            $this->result = 'ایمیل شما قبلا ثبت شده است.';
        }
        else
        {
            DB::table('subscribes')
                ->insert([
                    'email' => $this->email
                ]);
            $this->result = 'ایمیل شما با موفقیت ثبت شد.';
        }
    }
}
