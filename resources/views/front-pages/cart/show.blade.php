@extends('app')
@section('content')
        <section id="shppngCartSec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shppngCartBx">
                            <div class="ordrFrmWizBx">
                                <div class="FrmStepsBox">
                                    <div class="FrmSteps">
                                        <ul>
                                            <li>
                                                <span>1</span>
                                                <p>
                                                    <small class="icon-shopping_bag_black_24dp"></small>
                                                    <i>سبد خرید</i>
                                                </p>
                                            </li>
                                            <li>
                                                <span>2</span>
                                                <p>
                                                    <small class="icon-delivery-truck"></small>
                                                    <i>آدرس و اطلاعات</i>
                                                </p>
                                            </li>
                                            <li>
                                                <span>3</span>
                                                <p>
                                                    <small class="icon-credit_card_black_24dp"></small>
                                                    <i>پرداخت و تکمیل سفارش</i>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="FrmCntanrWiz">
                                    <div class="form-container animated">
                                        <div class="yourCartBx">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>سبد خرید شما</th>
                                                        <th>قیمت</th>
                                                        <th>تعداد</th>
                                                        <th>قیمت نهایی</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cart->products()->get() as $cartProduct)
                                                        @livewire('front.cart.product', ['cartProduct' => $cartProduct], key(rand(1,10000).'-'.$cartProduct->id))
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="frmPayPrice">
                                                @livewire('front.cart.discount-modal', ['cart' => $cart])
                                                <div>
                                                    <div class="frmTotalPrice">
                                                        <span>قیمت کل محصولات</span>
                                                        <p>{{ number_format($cart->totalOriginalPrice()) }} تومان</p>
                                                    </div>
                                                    <div class="frmPayMount">
                                                        <span>مبلغ قابل پرداخت</span>
                                                        <p>{{ number_format($cart->totalPurchasePrice()) }} تومان</p>
                                                    </div>
                                                </div>
                                                <div class="frmStpBtns">
                                                    <input type="button" value="ادامه خرید" class="frmStpNext next">
                                                </div>
                                            </div>

                                            <div class="frmPayNotif">
                                                <p>
                                                    هزینه این سفارش هنوز پرداخت نشده‌ و در صورت اتمام موجودی، کالاها از سبد حذف می‌شوند
                                                </p>
                                                <p>هزینه ارسال برای سفارشات بالای 150000 هزارتومان رایگان می باشد</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-container animated">
                                        @if(\Illuminate\Support\Facades\Auth::user()->addresses()->count() == 0)
                                            <div class="DestntnAddrss">
                                                <div class="DestAddrssBx">
                                                    <div>
                                                        <h6>لطفا ابتدا آدرسی را در حساب کاربریتان ایجاد نمایید.</h6>
                                                    </div>
                                                    <a href="{{ route('user.profile.details') }}" class="EditDestAdrs">ثبت آدرس جدید</a>
                                                </div>
                                            </div>
                                        @else
                                            @livewire('front.cart.addresses', ['cart' => $cart])
                                        @endif

                                        @livewire('front.cart.delivery-types', ['cart' => $cart])

                                        <div class="frmPayNotif">
                                            <p>هزینه ارسال برای سفارشات بالای 150000 هزارتومان رایگان می باشد</p>
                                        </div>
                                    </div>
                                    <div class="form-container animated">
                                        3
                                        <div class="frmStpBtns">
                                            <input type="submit" value="تائید و پرداخت" class="frmStpNext next">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
