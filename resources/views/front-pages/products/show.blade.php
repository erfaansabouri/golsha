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
                                <p>{{ number_format($product->purchase_price) }} تومان</p>
                            </div>
                            <a href="{{ route('user.cart.add-product', $product->id ) }}" class="prductInfBtn">
                                <span class="icon-shopping_bag_black_24dp"></span>
                                <i>افزودن به سبد خرید</i>
                            </a>
                            <div class="advsrSharBtns">
                                <a href="{{ route('support.index') }}" class="adviserBtn">
                                    <span class="icon-headset_mic_black_24dp"></span>
                                    <i>مشاوره</i>
                                </a>
                                <div>
                                    <a href=" https://wa.me/?text={{ urlencode(route('products.show', $product->id)) }}">
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
