<?php

namespace App\Http\Livewire\Front\Products;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddToCartButton extends Component
{
    public $product;
    public $status;

    public function mount($product)
    {
        $this->product = $product;
        $user = Auth::guard('web')->user();
        if($user && $user->cart()->exists())
        {
            $alreadyAdded = DB::table('cart_products')
                ->where('cart_id', $user->cart()->first()->id)
                ->where('product_id', $product->id)
                ->sum('count') > 0;

            if ($alreadyAdded)
                $this->status = 'go_to_cart';
            else
                $this->status = 'add_to_cart';
        }
    }

    public function render()
    {
        return view('livewire.front.products.add-to-cart-button');
    }
}
