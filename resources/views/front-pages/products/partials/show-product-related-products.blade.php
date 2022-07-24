<section class="drnkGlshaSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="drnkGlshaHdr">
                    <h3>محصولات مرتبط</h3>
                    <span></span>
                </div>
                <div class="drnkGlshaSldr">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach(\App\Models\Product::query()->inRandomOrder()->take(8)->get() as $similarProduct)
                                <div class="swiper-slide">
                                    <a href="{{ route('products.show', $similarProduct->id) }}" class="item">
                                        <div class="mostSailImg">
                                            <img src="{{ $similarProduct->first_image_path }}" alt="img">
                                        </div>
                                        <div class="mostSailInfo">
                                            <h6>{{ $similarProduct->title }}</h6>
                                            <div class="mostSailPric">
                                                @if($similarProduct->hasActiveDiscount())
                                                    <small>{{ $similarProduct->discount_percentage }}%</small>
                                                @endif
                                                <div>
                                                    <span>{{ $similarProduct->purchase_price }} تومان</span>
                                                    @if($similarProduct->hasActiveDiscount())
                                                        <del>{{ $similarProduct->price }} تومان</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
