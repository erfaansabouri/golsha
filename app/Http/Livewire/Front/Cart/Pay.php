<?php

namespace App\Http\Livewire\Front\Cart;

use Livewire\Component;

class Pay extends Component
{
    public $cart;

    public function mount($cart)
    {
        $this->cart = $cart;
    }

    public function render()
    {
        return view('livewire.front.cart.pay');
    }

    public function pay()
    {

        if(empty($this->cart->address_id) || empty($this->cart->delivery_type))
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"انتخاب آدرس و نحوه ارسال مرسوله اجباری است."
            ]);
            return;
        }
        $invoice = $this->cart->convertToInvoice();
        return redirect()->route('send-customer-to-payment-gateaway',[
            'invoice_id' => $invoice->id,
        ]);
    }
}
