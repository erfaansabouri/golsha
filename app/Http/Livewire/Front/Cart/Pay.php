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
            return  redirect()->route('user.cart.show')->with(['error' => 'آدرس و نحوه ارسال اجباری است.']);
        }
        $invoice = $this->cart->convertToInvoice();
        return redirect()->route('send-customer-to-payment-gateaway',[
            'invoice_id' => $invoice->id,
        ]);
    }
}
