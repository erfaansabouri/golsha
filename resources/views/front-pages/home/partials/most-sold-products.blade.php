<section id="mostSailSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mostSailBox tabSection">
                    <div class="ProductNav_Wrapper">
                        <nav id="ProductNav" class="ProductNav  dragscroll mouse-scroll" role="tablist">
                            <div id="ProductNavContents" class="nav ProductNav_Contents">
                                <a class="ProductNav_Link active" id="home-tab" data-toggle="tab" href="#tabOne" role="tab" aria-controls="tabOne" aria-selected="true">پرفروش های گلشا</a>
                                <a class="ProductNav_Link" id="profile-tab" data-toggle="tab" href="#tabTwo" role="tab" aria-controls="tabTwo" aria-selected="false">جدید ترین محصولات</a>
                                <span id="Indicator" class="ProductNav_Indicator"></span>
                            </div>
                            <small></small>
                        </nav>
                        <button id="AdvancerLeft" class="Advancer Advancer_Left" type="button">
                            <svg class="Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>
                        </button>
                        <button id="AdvancerRight" class="Advancer Advancer_Right" type="button">
                            <svg class="Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>
                        </button>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabOne" role="tabpanel" aria-labelledby="tabOne-tab">
                            <div class="mostSailSldr">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($mostSold as $product)
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
                            <a href="{{ route('products.index') }}" class="mostSailMore">همه محصولات</a>
                        </div>
                        <div class="tab-pane fade" id="tabTwo" role="tabpanel" aria-labelledby="tabTwo-tab">
                            <div class="mostSailSldr">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($mostSold as $product)
                                            <div class="swiper-slide">
                                                <a href="#" class="item">
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
            </div>
        </div>
    </div>
</section>
