<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Cart;
use Livewire\Component;

class Addresses extends Component
{
    public $addresses;
    public $chosen_id;
    public $cart;

    public function mount($cart)
    {
        $this->addresses = \Illuminate\Support\Facades\Auth::user()->addresses()->get();
        $this->cart = $cart;
        $this->chosen_id = $cart->address_id;
    }

    public function render()
    {
        return view('livewire.front.cart.addresses');
    }

    public function choose($cartId, $addressId)
    {
        $cart = Cart::query()->findOrFail($cartId);
        $cart->address_id = $addressId;
        $cart->save();
        $this->mount(Cart::query()->findOrFail($cartId));
        $this->render();
    }
}
