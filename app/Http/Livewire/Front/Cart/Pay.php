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
        $this->cart->convertToInvoice();
        return redirect()->to('http://zarinp.al/imanamiri');
    }
}
