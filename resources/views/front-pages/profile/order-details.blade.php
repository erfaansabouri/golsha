@extends('app')
@section('content')

    <section id="ordersSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="orderSecBox">
                        @include('front-pages.profile.profile-right-bar')
                        <div class="ordrsMain">
                            <div class="ordrsMainBx">
                                <div class="ordrDetailHdr">
                                    <div>
                                        <h6>جزییات سفارش</h6>
                                        <p>{{ $invoice->status }}</p>
                                        <ul>
                                            <li>تاریخ {{ verta($invoice->created_at)->format('%d %B %Y') }}</li>
                                            <li>کد سفارش {{ $invoice->unique_code }}</li>
                                            <li>مبلغ {{ number_format($invoice->total_price) }} تومان</li>
                                        </ul>
                                    </div>
                                    <a href="#">مشاهده فاکتور</a>
                                </div>
                                <div class="ordrDtailTtl">
                                    <ul>
                                        <li>تحویل گیرنده : {{ @$invoice->address->receiver_name }}</li>
                                        <li>شماره تماس: {{ @$invoice->address->phone_number }}</li>
                                        <li>مبلغ پرداختی: {{ number_format($invoice->paid_amount) }} تومان</li>
                                        <li>آدرس: {{ @$invoice->address->full }}</li>
                                        <li>نحوه ارسال: {{ @$invoice->delivery_type }}</li>
                                    </ul>
                                    <div class="ordrPayHstry">
                                        <h6>
                                            <i>تاریخچه تراکنش ها</i>
                                            <span class="material-icons-outlined">expand_more</span>
                                        </h6>
                                        <div class="payHstryBx">
                                            @if($invoice->paid_at)
                                                <strong class="confirmed">پرداخت شده</strong>
                                            @else
                                                <strong class="rejected">پرداخت نشده</strong>
                                            @endif
                                            @if($invoice->paid_at)
                                                    <p>کارت واریز کننده: {{ $invoice->card_owner_name }}</p>
                                                    <p>شماره کارت: {{ $invoice->card_number }}</p>
                                                    <p>بانک عامل: {{ $invoice->bank_name }}</p>
                                                    <p>به مبلغ: {{ number_format($invoice->paid_amount) }} تومان</p>
                                                    <p>در تاریخ: {{ verta($invoice->paid_at)->format('%d %B %Y') }}</p>
                                                    <p>با کد رهگیری: {{ $invoice->tracking_code }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="ordrDtailMain">
                                    <ul class="ordrDtailUl">
                                        @foreach($invoice->products()->get() as $product)
                                        <li class="ordrDtailLi">
                                            <div class="ordrDtailImg">
                                                <img src="{{ $product->productInfo->first_image_path }}" alt="img">
                                                <span>{{ $product->count }}</span>
                                            </div>
                                            <div class="ordrDtailInfo">
                                                <h5><a href="{{ route('products.show', $product->productInfo->id) }}">{{ $product->productInfo->title }}</a></h5>
                                                <div class="ordrDtlInfLst">
                                                    <ul>
                                                        <li>
                                                            <span class="icon-storefront_black_24dp"></span>
                                                            <i>فروشنده: {{ $product->productInfo->seller_name }}</i>
                                                        </li>
                                                        <li>
                                                            <span class="icon-storefront_black_24dp"></span>
                                                            <i>کد محصول: {{ $product->productInfo->id }}</i>
                                                        </li>
                                                        <li>
                                                            <span class="icon-aspect_ratio_black_24dp"></span>
                                                            <i>حجم محصول: {{ $product->productInfo->size }}</i>
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        @if($product->isPurchasedWithDiscount())
                                                        <li>
                                                            <small>{{ $product->discountPercentage() }}%</small>
                                                            <del>{{ number_format($product->total_original_price) }} تومان</del>
                                                        </li>
                                                        @endif
                                                        <li>مبلغ پرداختی: {{ number_format($product->total_purchase_price) }} تومان</li>
                                                    </ul>
                                                </div>
                                                <a href="{{ route('products.show', $product->productInfo->id) }}">
                                                    <span class="icon-chat_bubble_outline_black_24dp"></span>
                                                    <i>ثبت دیدگاه</i>
                                                </a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
