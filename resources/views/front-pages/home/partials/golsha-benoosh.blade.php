
<section class="drnkGlshaSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="drnkGlshaHdr">
                    <h3>محصولات غذایی بهترین</h3>
                    <span></span>
                </div>
                <div class="drnkGlshaSldr">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach(\App\Models\BehtarinCategory::all() ?? [] as $behtarinCategory)
                                <div class="swiper-slide">
                                    <a href="{{ route('products.index', ['behtarin_category_id' => $behtarinCategory->id]) }}" class="item">
                                        <div class="mostSailImg">
                                            <img src="{{ $behtarinCategory->image_path }}" alt="img">
                                        </div>
                                        <div class="mostSailInfo">
                                            <h6 class="text-center">{{ $behtarinCategory->title }}</h6>
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
