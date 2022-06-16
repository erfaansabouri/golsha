<div>
    <div class="sendMethodBx">
        <div class="sndMethodTtl">
            <span class="icon-inventory_2_black_24dp"></span>
            <i>روش ارسال را انتخاب کنید</i>
        </div>
        <div class="sndMethodRdio">
            <form>
                <div class="custom-control custom-radio custom-control-inline">
                    <input wire:click="choose(1)" type="radio" class="custom-control-input" id="customRadio" name="radio1" value="{{ \App\Models\Invoice::DELIVERY_TYPES['simple'] }}" @if($cart->delivery_type == \App\Models\Invoice::DELIVERY_TYPES['simple']) checked @endif>
                    <label class="custom-control-label" for="customRadio">
                        <div class="MthdRdioTitl">
                            <div>
                                <p>ارسال عادی</p>
                                <span>هزینه ارسال 10000 تومان</span>
                            </div>
                            <small>تحویل بین 5 تا 10 روز کاری</small>
                        </div>
                    </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input wire:click="choose(2)" type="radio" class="custom-control-input" id="customRadio2" name="radio1" value="{{ \App\Models\Invoice::DELIVERY_TYPES['rapid'] }}" @if($cart->delivery_type == \App\Models\Invoice::DELIVERY_TYPES['rapid']) checked @endif>
                    <label class="custom-control-label" for="customRadio2">
                        <div class="MthdRdioTitl">
                            <div>
                                <p>ارسال سریع</p>
                                <span>هزینه ارسال 20000 تومان</span>
                            </div>
                            <small>تحویل 2 تا 5 روز کاری</small>
                        </div>
                    </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input wire:click="choose(3)" type="radio" class="custom-control-input" id="customRadio3" name="radio1" value="{{ \App\Models\Invoice::DELIVERY_TYPES['one_day'] }}" @if($cart->delivery_type == \App\Models\Invoice::DELIVERY_TYPES['one_day']) checked @endif>
                    <label class="custom-control-label" for="customRadio3">
                        <div class="MthdRdioTitl">
                            <div>
                                <p>ارسال یک روزه (ویژه تهران)</p>
                                <span>هزینه ارسال 30000 تومان</span>
                            </div>
                            <small>تحویل محصول فردای ثبت سفارش شما</small>
                        </div>
                    </label>
                </div>
            </form>
        </div>
    </div>
    <div class="sendPriceBox">
        @if($cart->totalOriginalPrice() - $cart->delivery_amount >= 150000)
        <p>
            هزینه ارسال بسته شما رایگان می باشد
        </p>
        @else
            <p>
                هزینه ارسال بسته شما {{ $cart->delivery_amount }}  تومان میباشد
            </p>
        @endif
        <div>
            <strong>مبلغ قابل پرداخت</strong>
            <span>{{ number_format($cart->totalPurchasePrice() )}} تومان</span>
        </div>
        @livewire('front.cart.pay', ['cart' => $cart])
    </div>
</div>
