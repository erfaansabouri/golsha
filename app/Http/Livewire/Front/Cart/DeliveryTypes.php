<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Cart;
use App\Models\Invoice;
use Livewire\Component;

class DeliveryTypes extends Component
{
    public $cart;
    public $delivery_type;

    public function mount($cart)
    {
        $this->cart = $cart;
        $this->delivery_type = $cart->delivery_type ?? 'simple';
    }

    public function render()
    {
        return view('livewire.front.cart.delivery-types');
    }

    public function choose($deliveryType)
    {
        $id = '';
        $delivery_amount = 0;
        switch ($deliveryType){
            case 1:
                $id =  Invoice::DELIVERY_TYPES['simple'];
                break;
            case 2:
                $id =  Invoice::DELIVERY_TYPES['rapid'];
                break;
            case 3:
                $id =  Invoice::DELIVERY_TYPES['one_day'];
                break;
        }

        switch ($deliveryType){
            case 1:
                $delivery_amount =  10000; // todo
                break;
            case 2:
                $delivery_amount =  20000; // todo
                break;
            case 3:
                $delivery_amount =  30000; // todo
                break;
        }
        if ($this->cart->totalOriginalPrice() - $this->cart->delivery_amount >= 150000)
        {
            $this->cart->delivery_type = $id;
            $this->cart->delivery_amount = 0;
            $this->cart->save();
        }
       else
       {
           $this->cart->delivery_type = $id;
           $this->cart->delivery_amount = $delivery_amount;
           $this->cart->save();
       }
    }
}
