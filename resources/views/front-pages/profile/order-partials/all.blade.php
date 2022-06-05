<ul class="ordrsLstBx">
    @foreach(@$invoiceItems ?? [] as $invoice)
        <li class="ordrsBxLi">
            <div class="ordrsBxHed">
                <p>{{ $invoice->status }}</p>
                <ul>
                    <li>تاریخ {{ verta($invoice->created_at)->format('%d %B %Y') }}</li>
                    <li>کد سفارش {{ $invoice->unique_code }}</li>
                    <li>مبلغ {{ number_format($invoice->total_price) }} تومان</li>
                </ul>
            </div>
            <div class="ordrsBxBdy">
                <div class="ordrsBxPrdct">
                    <ul>
                        @foreach($invoice->products()->take(5)->get() as $invoiceProduct)
                            <li>
                                <img src="{{ $invoiceProduct->productInfo->first_image_path }}" alt="{{ $invoiceProduct->productInfo->id }}">
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="ordrsBxBtns">
                    <a href="{{ route('user.profile.order-details', $invoice->id) }}">جزییات بیشتر</a>
                    <a href="{{ route('user.profile.order-details', $invoice->id) }}">مشاهده فاکتور</a>
                </div>
            </div>
        </li>
    @endforeach
</ul>
