<section id="vipPrdctSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="vipPrdctHdr">
                    <h3>محصولات ویژه</h3>
                    <span></span>
                </div>
                <div class="vipPrdctBox">
                    <div class="vipPrdctRght">
                        @foreach(\App\Models\Product::query()->special()->inRandomOrder()->take(3)->get() as $product)
                            <a href="{{ route('products.show', $product->id) }}" class="vipRghtCrd">
                                <div class="vipCrdRghtImg">
                                    <img src="{{ $product->first_image_path }}" alt="img">
                                </div>
                                <div class="vipCrdRghtTxt">
                                    <h6>{{ $product->title }}</h6>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="vipPrdctlft">
                        @foreach(\App\Models\Product::query()->special()->inRandomOrder()->take(2)->get() as $product)
                            <a href="#" class="vipLeftCrd">
                                <div class="vipCrdLftTxt">{{ $product->title }}</div>
                                <div class="vipCrdLftImg">
                                    <img src="{{ $product->first_image_path }}" alt="img">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
