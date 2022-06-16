<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'invoices';
	protected $guarded = [];

	const STATUSES = [
		'waiting_payment' => 'در انتظار پرداخت',
		'processing' => 'در حال پردازش',
		'done' => 'تکمیل شده',
		'canceled' => 'لغو شده',
		'failed_payment' => 'پرداخت ناموفق',
	];

	const DELIVERY_TYPES = [
		'simple' => 'عادی',
		'rapid' => 'سریع',
		'one_day' => 'یک روزه',
	];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function products()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->totalPrice();
    }

    public function totalPrice()
    {
        $invoiceProducts = InvoiceProduct::query()->where('invoice_id', $this->id)
            ->get();

        $totalPrice = 0;

        foreach ($invoiceProducts as $invoiceProduct)
        {
            $totalPrice += $invoiceProduct->total_purchase_price;
        }
        return $totalPrice;
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
}
