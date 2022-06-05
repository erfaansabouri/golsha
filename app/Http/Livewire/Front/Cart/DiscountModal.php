<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Cart;
use App\Models\Coupon;
use Livewire\Component;

class DiscountModal extends Component
{
    public $cart;
    public $code;
    public $result = '';

    public function mount($cart)
    {
        $this->cart = $cart;
    }

   public function submitCode($cartId)
   {
       $coupon = Coupon::query()->where('code', $this->code)->first();
       if(!$coupon)
       {
           $this->result = 'کد نامعتبر';
           return;
       }

       $cart = Cart::query()
           ->where('id', $cartId)
           ->firstOrFail();

       $cart->coupon_id = $coupon->id;
       $cart->discount_percentage = $coupon->discount_percentage ?? 0;
       $cart->discount_toman = $coupon->discount_toman ?? 0;
       $cart->save();

       $this->result = 'کد اعمال شد';
       return redirect(route('user.cart.show'));
   }

   public function removeCoupon($cartId)
   {
       $cart = Cart::query()
           ->where('id', $cartId)
           ->firstOrFail();

       $cart->coupon_id = null;
       $cart->discount_percentage =  0;
       $cart->discount_toman = 0;
       $cart->save();
       return redirect(route('user.cart.show'));
   }

    public function render()
    {
        return view('livewire.front.cart.discount-modal');
    }
}
