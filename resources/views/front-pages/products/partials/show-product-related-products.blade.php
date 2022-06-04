<div class="prdctRltdHdr">
    <h3>محصولات مرتبط</h3>
    <span></span>
</div>
<div class="prdctRltdSldr">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach(\App\Models\Product::query()->inRandomOrder()->take(8)->get() as $similarProduct)
            <div class="swiper-slide">
                <a href="{{ route('products.show', $similarProduct->id) }}"><img src="{{ $similarProduct->first_image_path }}" alt="img"></a>
            </div>
            @endforeach
        </div>
    </div>
</div>
