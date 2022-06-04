<section id="glshaPakSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="glshaPakHdr">
                    <h3>پک های گلشا</h3>
                    <span></span>
                </div>
                <div class="glshaPaksBox">
                    @foreach(\App\Models\Product::query()->golshaPacks()->take(4)->get() as $product)
                        <a href="{{ route('products.show', $product->id) }}" class="glshaPakCrd">
                            <div class="packCardImg">
                                <img src="{{ $product->first_image_path }}" alt="img">
                            </div>
                            <div class="packCardBdy">
                                <h4>{{ $product->title }}</h4>
                                <div class="packCrdPric">
                                    @if($product->hasActiveDiscount())
                                    <div>
                                        <small>{{ $product->discount_percentage }}%</small>
                                        <del>{{ $product->price }} تومان</del>
                                    </div>
                                    @endif
                                    <div>
                                        <p>{{ $product->purchase_price }}</p>
                                        <span>تومان</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
