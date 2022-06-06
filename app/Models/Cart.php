<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(CartProduct::class);
    }

    public function totalOriginalPrice()
    {
        $products = $this->products()->get();
        $total = 0;
        foreach ($products as $product)
        {
            $total += $product->count * $product->product_original_price;
        }

        if(!empty($cart->delivery_amount))
        {
            $total += $cart->delivery_amount;
        }

        return $total;
    }

    public function totalPurchasePrice()
    {
        $products = $this->products()->get();
        $total = 0;
        foreach ($products as $product)
        {
            $total += $product->count * $product->product_purchase_price;
        }

        if(!empty($this->discount_toman))
        {
            $total = $total - $this->discount_toman;
        }
        elseif(!empty($this->discount_percentage))
        {
            $total =  ((100 - $this->discount_percentage) / 100) * $total ;
        }

        if(!empty($this->delivery_amount))
        {
            $total += $this->delivery_amount;
        }

        return $total;
    }

    public function convertToInvoice()
    {
        $invoice = (new Invoice());
        $invoice->user_id = $this->user_id;
        $invoice->unique_code = rand(100000,99999999999);
        $invoice->address_id = $this->address_id;
        $invoice->coupon_id = $this->coupon_id;
        $invoice->discount_percentage = $this->dicount_percentage ?? 0;
        $invoice->status = Invoice::STATUSES['processing'];
        $invoice->delivery_type = $this->delivery_type;
        $invoice->delivery_amount = $this->delivery_amount;
        $invoice->save();

        $cartProducts = $this->products()->get();
        foreach ($cartProducts as $cartProduct)
        {
            $invoiceProduct = (new InvoiceProduct());
            $invoiceProduct->invoice_id = $invoice->id;
            $invoiceProduct->product_id = $cartProduct->product_id;
            $invoiceProduct->count = $cartProduct->count;
            $invoiceProduct->product_original_price = $cartProduct->product_original_price;
            $invoiceProduct->product_purchase_price = $cartProduct->product_purchase_price;
            $invoiceProduct->total_original_price = $cartProduct->total_original_price;
            $invoiceProduct->total_purchase_price = $cartProduct->total_purchase_price;
            $invoiceProduct->save();
        }

        $this->products()->delete();
        $this->delete();
    }
}
