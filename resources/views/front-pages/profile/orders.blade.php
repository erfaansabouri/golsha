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
                                <div class="ordrsMainHdr">
                                    <p>سفارش ها</p>
                                    <span>مجموع سفارشات: {{ $allInvoices->count() }} سفارش</span>
                                </div>
                                <div class="tabSection">
                                    <div class="ProductNav_Wrapper">
                                        <nav id="ProductNav" class="ProductNav dragscroll mouse-scroll" role="tablist">
                                            <div id="ProductNavContents" class="nav ProductNav_Contents">
                                                <a class="ProductNav_Link" id="profile-tab" data-toggle="tab" href="#tabFour" role="tab" aria-controls="tabFour" aria-selected="false">لغو شده</a>
                                                <a class="ProductNav_Link" id="profile-tab" data-toggle="tab" href="#tabThre" role="tab" aria-controls="tabThre" aria-selected="false">تکمیل شده</a>
                                                <a class="ProductNav_Link" id="profile-tab" data-toggle="tab" href="#tabTwo" role="tab" aria-controls="tabTwo" aria-selected="false">جاری</a>
                                                <a class="ProductNav_Link active" id="home-tab" data-toggle="tab" href="#tabOne" role="tab" aria-controls="tabOne" aria-selected="true">همه سفارشات</a>
                                                <span id="Indicator" class="ProductNav_Indicator"></span>
                                            </div>
                                        </nav>
                                        <button id="AdvancerLeft" class="Advancer Advancer_Left" type="button">
                                            <svg class="Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>
                                        </button>
                                        <button id="AdvancerRight" class="Advancer Advancer_Right" type="button">
                                            <svg class="Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>
                                        </button>
                                    </div>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabOne" role="tabpanel" aria-labelledby="tabOne-tab">
                                            @include('front-pages.profile.order-partials.all', ['invoiceItems' => $allInvoices])
                                        </div>
                                        <div class="tab-pane fade" id="tabTwo" role="tabpanel" aria-labelledby="tabTwo-tab">
                                            @include('front-pages.profile.order-partials.all', ['invoiceItems' => $processingInvoices])
                                        </div>
                                        <div class="tab-pane fade" id="tabThre" role="tabpanel" aria-labelledby="tabThre-tab">
                                            @include('front-pages.profile.order-partials.all', ['invoiceItems' => $doneInvoices])
                                        </div>
                                        <div class="tab-pane fade" id="tabFour" role="tabpanel" aria-labelledby="tabFour-tab">
                                            @include('front-pages.profile.order-partials.all', ['invoiceItems' => $canceledInvoices])
                                        </div>
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
