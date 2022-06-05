<?php

namespace App\Http\Livewire\Front\Cart;

use Livewire\Component;

class TotalPrice extends Component
{
    protected $listeners = [
        '$refresh'
    ];

    public $cart;
    public $totalOriginalPrice;
    public $totalPurchasePrice;

    public function mount($cart)
    {
        $this->cart = $cart;
        $this->totalOriginalPrice = $cart->totalOriginalPrice();
        $this->totalPurchasePrice = $cart->totalPurchasePrice();
    }

    public function render()
    {
        return view('livewire.front.cart.total-price');
    }

}
