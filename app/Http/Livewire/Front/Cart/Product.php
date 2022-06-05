<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Cart;
use App\Models\CartProduct;
use Livewire\Component;

class Product extends Component
{
    public $cartProduct;
    public $count;
    public $totalPrice;

    public function mount($cartProduct)
    {
        $this->cartProduct = $cartProduct;
        $this->count = $cartProduct->count;
        $this->totalPrice = $cartProduct->product_purchase_price * $cartProduct->count;
    }


    public function increaseCartProductCount($id)
    {
        $cartProduct = CartProduct::query()->where('id', $id)
            ->firstOrFail();
        $cartProduct->count = $cartProduct->count + 1;
        $cartProduct->save();
        return redirect(route('user.cart.show'));

    }

    public function decreaseCartProductCount($id)
    {
        $cartProduct = CartProduct::query()->where('id', $id)
            ->firstOrFail();

        if ($cartProduct->count > 1)
        {
            $cartProduct->count = $cartProduct->count - 1;
            $cartProduct->save();
            return redirect(route('user.cart.show'));
        }
        else
        {
            $cartProduct->delete();
            return redirect(route('user.cart.show'));
        }
    }

    public function deleteCartProduct($id)
    {
        $cartProduct = CartProduct::query()->where('id', $id)
            ->firstOrFail();

        $cartProduct->delete();

        return redirect(route('user.cart.show'));
    }


    public function render()
    {
        return view('livewire.front.cart.product');
    }
}
