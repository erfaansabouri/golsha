<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $cart;

    public function mount()
    {
        $this->cart = Cart::query()->where('user_id', Auth::user()->id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.front.cart.show');
    }
}
