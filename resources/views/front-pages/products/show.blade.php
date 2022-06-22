@extends('app')
@section('content')

    <section id="pageMapSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pageMapSec">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">
                                    <span class="icon-home_black_24dp"></span>
                                    <i>گلشا</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="prdctIntrdctnSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="prdctIntrdctn">
                        <div class="productImgs">
                            <div class="productSlider">
                                <div class="swiper AdSwiper2">
                                    <div class="swiper-wrapper">
                                        @foreach($product->images()->get() as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ $image->path }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div thumbsSlider="" class="swiper AdSwiper1">
                                    <div class="swiper-wrapper">
                                        @foreach($product->images()->get() as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ $image->path }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="productInfos">
                            <h1>{{ $product->title }}</h1>
                            <ul class="prductInfLst">
                                <li>
                                    <span>فروشنده:</span>
                                    {{ $product->seller_name }}
                                </li>
                                <li>
                                    <span>برخی ترکیبات:</span>{!! $product->ingredients  !!}
                                </li>
                                <li>
                                    <span>حجم:</span>
                                    {!! $product->size !!}
                                </li>
                                <li>
                                    <span>خواص:</span>
                                    {!! $product->virtues !!}
                                </li>
                            </ul>
                            <div class="prdctInfoPric">
                                @if($product->hasActiveDiscount())
                                    <del>{{ number_format($product->price) }} تومان</del>
                                    <small>{{ $product->discount_percentage }}%</small>
                                @endif
                                <p style="font-size: 30px">{{ number_format($product->purchase_price) }} تومان</p>
                            </div>
                            @livewire('front.products.add-to-cart-button', ['product' => $product])
                            <div class="advsrSharBtns">
                                <a href="{{ route('support.index') }}" class="adviserBtn">
                                    <span class="icon-headset_mic_black_24dp"></span>
                                    <i>مشاوره</i>
                                </a>
                                <div>
                                    <a style="cursor:pointer;" data-toggle="modal" data-target="#share-modal">
                                        <span class="icon-share_black_24dp"></span>
                                    </a>


                                    @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                        <a href="{{ route('products.save', $product->id) }}">
                                            <span class="icon-bookmark_border_black_24dp"></span>
                                        </a>
                                    @else
                                        <a href="{{ route('user.auth.login.form') }}">
                                            <span class="icon-bookmark_border_black_24dp"></span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div class="modal" id="share-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">اشتراک گذاری</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="col-12">
                            <div class="row mb-3">
                                <div class="card w-100">
                                    <a href="https://t.me/share/url?url={{ route('products.show', $product->id) }}" target="_blank">
                                        <div class="card-body text-center">اشتراک گذاری در تلگرام</div>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="card w-100">
                                    <a href="https://api.whatsapp.com/send?text={{ route('products.show', $product->id) }}" target="_blank">
                                        <div class="card-body text-center">اشتراک گذاری در واتساپ</div>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card w-100">
                                    <a href="https://twitter.com/share?url={{ route('products.show', $product->id) }}" target="_blank">
                                        <div class="card-body text-center">اشتراک گذاری در توییتر</div>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card w-100">
                                    <input class="mb-2 form-control" style="direction: ltr" type="text" value="{{ route('products.show', $product->id) }}" id="copyMe">
                                    <button class="btn btn-info" onclick="copyToClipboard()">کپی کردن لینک</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                </div>

            </div>
        </div>
    </div>

    @include('front-pages.products.partials.show-product-options')
    @include('front-pages.products.partials.product-details')

    <section id="prdctRltdSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   @include('front-pages.products.partials.show-product-related-products')
                   @include('front-pages.products.partials.show-product-related-blog-posts')
                </div>
            </div>
        </div>
    </section>
@endsection
