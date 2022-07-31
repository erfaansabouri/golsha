<section class="drnkGlshaSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="drnkGlshaHdr">
                    <h3>پیشنهاد گلشا</h3>
                    <span></span>
                </div>
                <div class="drnkGlshaSldr">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach(\App\Models\Product::query()->suggestion()->latest()->take(8)->get() as $product)
                                <div class="swiper-slide">
                                    <a href="{{ route('products.show', $product->id) }}" class="item">
                                        <div class="mostSailImg">
                                            <img src="{{ $product->first_image_path }}" alt="img">
                                        </div>
                                        <div class="mostSailInfo">
                                            <h6>{{ $product->title }}</h6>
                                            <div class="mostSailPric">
                                                @if($product->hasActiveDiscount())
                                                    <small>{{ $product->discount_percentage }}%</small>
                                                @endif
                                                <div>
                                                    <span>{{ $product->purchase_price }} تومان</span>
                                                    @if($product->hasActiveDiscount())
                                                        <del>{{ $product->price }} تومان</del>
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
