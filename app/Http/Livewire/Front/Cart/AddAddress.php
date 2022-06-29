<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddAddress extends Component
{
    public $cart;
    public $receiver_name;
    public $phone_number;
    public $country;
    public $state;
    public $city;
    public $first_line;
    public $second_line;

    public function mount($cart)
    {
        $this->cart = $cart;
    }

    public function render()
    {
        return view('livewire.front.cart.add-address');
    }

    public function storeAddress()
    {
        $user = Auth::user();
        $address = Address::query()->create([
            'user_id' => \auth()->user()->id,
            'receiver_name' => $this->receiver_name,
            'phone_number' => $this->phone_number,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'first_line' => $this->first_line,
            'second_line' => $this->second_line,
        ]);

        $this->cart->address_id = $address->id;
        $this->cart->save();
        return redirect()->route('user.cart.show', ['active_step' => 'second']);
        $this->dispatchBrowserEvent('addressCreated');
    }
}
