<div>
    @php
        $settings = \App\Models\Setting::query()->whereCategory('about-us')->get();
    @endphp
    <section id="abutTopSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="abutTpSecBx">
                        <div class="abtTpSecImg">
                            <img src="{{ (new \App\Models\Setting())->findByKey('about-us-1') }}" alt="img">
                        </div>
                    </div>
                    <div class="acquaintedBox">
                        <h5>{{ (new \App\Models\Setting())->findByKey('about-us-2') }}</h5>
                        <p>
                            {!! (new \App\Models\Setting())->findByKey('about-us-3') !!}
                        </p>
                    </div>
                    <div class="abtCuntersBx">
                        <div class="abtCuntrsLi clientCnterBx">
                            <img src="{{ asset('assets/front/img/icon4.png') }}" alt="img">
                            <h6>مشتری</h6>
                            <div>
                                <small>مشتری</small>
                                <p class="statistics-boxes-description-value counter-box"><span class="counter" data-count="100">0</span></p>
                            </div>
                        </div>
                        <div class="abtCuntrsLi prductCnterBx">
                            <img src="{{ asset('assets/front/img/icon5.png') }}" alt="img">
                            <h6>محصول</h6>
                            <div>
                                <small>محصول</small>
                                <p class="statistics-boxes-description-value counter-box"><span class="counter" data-count="100">0</span></p>
                            </div>
                        </div>
                        <div class="abtCuntrsLi usersCnterBx">
                            <img src="{{ asset('assets/front/img/icon6.png') }}" alt="img">
                            <h6>کارکنان</h6>
                            <div>
                                <small>پرسنل</small>
                                <p class="statistics-boxes-description-value counter-box"><span class="counter" data-count="100">0</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="aboutPicSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aboutPicBox">
                        <div class="image_parent">
                            <div class="image_inner">
                                <img src="{{ (new \App\Models\Setting())->findByKey('about-us-4') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="onlineShopSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="onlineShopBox">
                        <div class="onlinShopInfo">
                            <h4>{{ (new \App\Models\Setting())->findByKey('about-us-5') }}</h4>
                            <h3>{{ (new \App\Models\Setting())->findByKey('about-us-6') }}</h3>
                            <p>
                                {{ (new \App\Models\Setting())->findByKey('about-us-7') }}
                            </p>
                            <a href="{{ route('products.index') }}">محصولات</a>
                        </div>
                        <div class="onlinShopImg">
                            <img src="{{ (new \App\Models\Setting())->findByKey('about-us-8') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="GolshaInfoSec">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="GolshaInfoBox">
                        <div class="GolshaInfoRght">
                            <div class="GolshaInfoHed">
                                <img src="{{ (new \App\Models\Setting())->findByKey('about-us-9') }}" alt="img">
                                <div>
                                    <p>{{ (new \App\Models\Setting())->findByKey('about-us-10') }}</p>
                                    <span>{{ (new \App\Models\Setting())->findByKey('about-us-11') }}</span>
                                </div>
                            </div>
                            <div class="GolshaInfobdy">
                                {{ (new \App\Models\Setting())->findByKey('about-us-12') }}
                            </div>
                        </div>
                        <div class="GolshaInfoLeft">
                            <div class="GolshaInfoTop">
                                <div class="GlshaInfoLftBx">
                                    <div class="GolshaInfoHed">
                                        <div class="GolshaInfIcon">
                                            <small class="icon-spa_black_24dp"></small>
                                        </div>
                                        <div>
                                            <p>{{ (new \App\Models\Setting())->findByKey('about-us-13') }}</p>
                                            <span>{{ (new \App\Models\Setting())->findByKey('about-us-14') }}</span>
                                        </div>
                                    </div>
                                    <div class="GolshaInfobdy">
                                        {{ (new \App\Models\Setting())->findByKey('about-us-15') }}
                                    </div>
                                </div>
                                <div class="GlshaInfoLftBx">
                                    <div class="GolshaInfoHed">
                                        <div class="GolshaInfIcon">
                                            <small class="icon-workspace_premium_black_24dp"></small>
                                        </div>
                                        <div>
                                            <p>{{ (new \App\Models\Setting())->findByKey('about-us-16') }}</p>
                                            <span>{{ (new \App\Models\Setting())->findByKey('about-us-17') }}</span>
                                        </div>
                                    </div>
                                    <div class="GolshaInfobdy">
                                        {{ (new \App\Models\Setting())->findByKey('about-us-18') }}
                                    </div>
                                </div>
                            </div>
                            <div class="GolshaInfoBtm">
                                <div class="GlshaInfoLftBx">
                                    <div class="GolshaInfoHed">
                                        <div class="GolshaInfIcon">
                                            <small class="icon-headset_mic_black_24dp"></small>
                                        </div>
                                        <div>
                                            <p>{{ (new \App\Models\Setting())->findByKey('about-us-19') }}</p>
                                            <span>{{ (new \App\Models\Setting())->findByKey('about-us-20') }}</span>
                                        </div>
                                    </div>
                                    <div class="GolshaInfobdy">
                                        {{ (new \App\Models\Setting())->findByKey('about-us-21') }}
                                    </div>
                                </div>
                                <div class="GlshaInfoLftBx">
                                    <div class="GolshaInfoHed">
                                        <div class="GolshaInfIcon">
                                            <small class="icon-sentiment_very_satisfied_black_24dp"></small>
                                        </div>
                                        <div>
                                            <p>{{ (new \App\Models\Setting())->findByKey('about-us-22') }}</p>
                                            <span>{{ (new \App\Models\Setting())->findByKey('about-us-23') }}</span>
                                        </div>
                                    </div>
                                    <div class="GolshaInfobdy">
                                        {{ (new \App\Models\Setting())->findByKey('about-us-24') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="golshaGalrySec">
        <div class="proivdSwiper">
            <div class="swiper-container">
                <div class="swiper-wrapper"  id="lightgallery">
                    <a href="{{ (new \App\Models\Setting())->findByKey('about-us-25') }}" class="swiper-slide animate__animated animate__fadeIn">
                        <img src="{{ (new \App\Models\Setting())->findByKey('about-us-25') }}" alt="عنوان" />
                    </a>
                    <a href="{{ (new \App\Models\Setting())->findByKey('about-us-26') }}" class="swiper-slide animate__animated animate__fadeIn">
                        <img src="  {{ (new \App\Models\Setting())->findByKey('about-us-26') }}"  alt="عنوان" />
                    </a>
                    <a href="{{ (new \App\Models\Setting())->findByKey('about-us-27') }}" class="swiper-slide animate__animated animate__fadeIn">
                        <img src="{{ (new \App\Models\Setting())->findByKey('about-us-27') }}"  alt="عنوان" />
                    </a>
                    <a href="{{ (new \App\Models\Setting())->findByKey('about-us-28') }}" class="swiper-slide animate__animated animate__fadeIn">
                        <img src="{{ (new \App\Models\Setting())->findByKey('about-us-28') }}"  alt="عنوان"/>
                    </a>
                    <a href="{{ (new \App\Models\Setting())->findByKey('about-us-29') }}" class="swiper-slide animate__animated animate__fadeIn">
                        <img src="{{ (new \App\Models\Setting())->findByKey('about-us-29') }}"  alt="عنوان" />
                    </a>
                    <a href="{{ (new \App\Models\Setting())->findByKey('about-us-30') }}" class="swiper-slide animate__animated animate__fadeIn">
                        <img src="{{ (new \App\Models\Setting())->findByKey('about-us-30') }}"  alt="عنوان" />
                    </a>
                </div>
            </div>
        </div>
        <div class="gllrySecTitl">
            عکس های ارسالی گلشایی ها
        </div>
    </section>
</div>
