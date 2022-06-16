<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function sendCustomerToPaymentGateaway(Request $request)
    {
        $description = $request->description ?? 'Payment for order';
        $callback_url = route('verify-payment-status');
        $mobile = $request->mobile ?? '';
        $email = $request->email ?? '';
        $invoice_id = $request->invoice_id;
        $invoice = Invoice::query()
            ->where('id', $invoice_id)
            ->firstOrFail();
        $amount = $invoice->totalPurchasePrice();

        $response = zarinpal()
            ->merchantId('45c26d30-3d65-450d-94a8-43eb32190f28')
            ->amount($amount * 10)
            ->request()
            ->description($description)
            ->callbackUrl($callback_url)
            ->mobile($mobile)
            ->email($email)
            ->send();

        if (!$response->success()) {
            return $response->error()->message();
        }


        $invoice->tracking_code = $response->authority();
        $invoice->save();

        return $response->redirect();
    }

    public function verifyPaymentStatus(Request $request)
    {
        $authority = request()->query('Authority');
        $status = request()->query('Status');

        $invoice = Invoice::query()
            ->where('tracking_code', $authority)
            ->firstOrFail();

        $response = zarinpal()
            ->merchantId('45c26d30-3d65-450d-94a8-43eb32190f28')
            ->amount($invoice->totalPurchasePrice() * 10)
            ->verification()
            ->authority($authority)
            ->send();

        if (!$response->success()) {
            $invoice->status = Invoice::STATUSES['failed_payment'];
            $invoice->save();
            return $response->error()->message();
        }

        $cart_pan = $response->cardPan();
        $invoice->paid_at = Carbon::now();
        $invoice->status = Invoice::STATUSES['processing'];
        $invoice->card_number = $cart_pan;
        $invoice->paid_amount = $invoice->totalPurchasePrice();
        $invoice->save();
        return redirect()->route('user.profile.orders');
    }
}
