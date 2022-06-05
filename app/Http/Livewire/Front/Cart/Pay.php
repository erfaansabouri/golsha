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
}
