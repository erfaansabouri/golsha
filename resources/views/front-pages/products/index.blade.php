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
                            @if($currentFilterName)
                                <li>
                                    <p>
                                        <small class="material-icons opnSubSub">keyboard_arrow_left</small>
                                    </p>
                                </li>
                                <li>
                                    <a href="{{ route('home') }}">
                                        <i>{{ $currentFilterName }}</i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="prdctIntrnlSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="prdctIntrnlBox">
                        @include('front-pages.products.partials.side-categories')
                        <div class="prdctIntrnlMain">
                            @include('front-pages.products.partials.banners')
                            <div class="similrPrdctLst">
                                <div class="table-responsive">
                                    <table>
                                        <tbody>
                                        @foreach($productGroups as $productGroup)
                                            <tr>
                                                @foreach($productGroup as $product)
                                                    <td>
                                                        <a href="{{ route('products.show', $product->id) }}" class="simlrPrdctCrd">
                                                            <div class="simlrPrdctImg">
                                                                <img src="{{ $product->first_image_path }}" alt="img">
                                                            </div>
                                                            <div class="simlrPrdctBdy">
                                                                <h6>{{ $product->title }}</h6>
                                                                <div class="smlrPrdctPrc">
                                                                    @if($product->hasActiveDiscount())
                                                                        <span>{{ $product->discount_percentage }}%</span>
                                                                    @endif
                                                                    <div>
                                                                        <p>{{ $product->purchase_price }} تومان</p>
                                                                        @if($product->hasActiveDiscount())
                                                                        <small><del>{{ $product->price }} تومان</del></small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="relatedPrdcts">
                                @include('front-pages.products.partials.related-blog-posts')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
