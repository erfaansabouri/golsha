<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::query()
            ->where('user_id', $user->id)
            ->first();

        if(!$cart)
        {
            $cart = Cart::query()->create([
                'user_id' => $user->id,
            ]);
        }

        $hasProduct = CartProduct::query()->where('cart_id', $cart->id)->count();

        if($hasProduct == 0)
        {
            return redirect()->route('products.index');
        }

        return view('front-pages.cart.show', compact('cart'));
    }

    public function addToCart($id)
    {
        $user = Auth::user();
        $cart = Cart::query()
            ->where('user_id', $user->id)
            ->first();

        if(!$cart)
        {
            $cart = Cart::query()->create([
                'user_id' => $user->id,
            ]);
        }

        $cartProduct = CartProduct::query()
            ->where('product_id', $id)
            ->first();

        $product = Product::query()->findOrFail($id);

        if($cartProduct)
        {
            $newCount = $cartProduct->count + 1;
            $cartProduct->count = $newCount;
            $cartProduct->product_original_price = $product->price;
            $cartProduct->product_purchase_price = $product->purchase_price;
            $cartProduct->total_original_price = $newCount * $product->price;
            $cartProduct->total_purchase_price = $newCount * $product->purchase_price;
            $cartProduct->save();
        }
        else
        {
            $cartProduct = (new CartProduct());
            $newCount =  1;
            $cartProduct->cart_id = $cart->id;
            $cartProduct->product_id = $product->id;
            $cartProduct->count = $newCount;
            $cartProduct->product_original_price = $product->price;
            $cartProduct->product_purchase_price = $product->purchase_price;
            $cartProduct->total_original_price = $newCount * $product->price;
            $cartProduct->total_purchase_price = $newCount * $product->purchase_price;
            $cartProduct->save();
        }

        return redirect()->route('user.cart.show');
    }
}
