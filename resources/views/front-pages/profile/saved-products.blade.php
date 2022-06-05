@extends('app')
@section('content')


    <section id="ordersSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="orderSecBox">
                        @include('front-pages.profile.profile-right-bar')
                        <div class="ordrsMain">
                            <div class="savedPrdctBx">
                                <div class="savdPrdctTtl">
                                    <h5>محصولات ذخیره شده</h5>
                                </div>
                                <ul class="savdPBxList">
                                    @foreach($products as $product)
                                        <li class="savedPBox">
                                            <div class="savedPBxImg">
                                                <img src="{{ $product->firstImage() ? $product->firstImage()->path : '' }}" alt="img">
                                            </div>
                                            <div class="savedPBxInfo">
                                                <p>{{ $product->title }}</p>
                                                <a href="{{ route('user.cart.add-product', $product->id ) }}" class="savdPAddBtn">
                                                    <span class="icon-shopping_bag_black_24dp"></span>
                                                    <i>افزودن به سبد خرید</i>
                                                </a>
                                                <a href="{{ route('user.profile.destroy-saved-product', $product->id) }}" class="savdPDelBtn">
                                                    <span class="icon-trashcan1"></span>
                                                    <i>حذف</i>
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
    </section>
@endsection
