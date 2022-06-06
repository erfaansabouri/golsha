<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'invoices';
	protected $guarded = [];

	const STATUSES = [
		'processing' => 'در حال پردازش',
		'done' => 'تکمیل شده',
		'canceled' => 'لغو شده',
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
}
