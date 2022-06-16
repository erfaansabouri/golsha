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

    public function productsOriginalPrice()
    {
        $products = $this->products()->get();
        $result = 0;
        foreach ($products as $product)
        {
            $result = $product->totalOriginalPrice();
        }
        return $result;
    }

    public function productsPurchasePrice()
    {
        $products = $this->products()->get();
        $result = 0;
        foreach ($products as $product)
        {
            $result = $product->totalPurchasePrice();
        }
        return $result;
    }

    public function deliveryPrice()
    {
        return $this->delivery_amount ?? 0;
    }

    public function discountPrice()
    {
        if(empty($this->discount_percentage))
            return 0;
        else
        {
            return round($this->productsPurchasePrice() * ($this->discount_percentage / 100));
        }
    }

    public function totalOriginalPrice()
    {
        return $this->productsOriginalPrice() + $this->deliveryPrice() - $this->discountPrice();
    }

    public function totalPurchasePrice()
    {
        return $this->productsPurchasePrice() + $this->deliveryPrice() - $this->discountPrice();
    }


    public function convertToInvoice()
    {
        $invoice = (new Invoice());
        $invoice->user_id = $this->user_id;
        $invoice->unique_code = rand(100000,999999999999);
        $invoice->address_id = $this->address_id;
        $invoice->coupon_id = $this->coupon_id;
        $invoice->discount_percentage = $this->discount_percentage ?? 0;
        $invoice->status = Invoice::STATUSES['waiting_payment'];
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

        return $invoice;
    }
}
