
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="quicOrdrBox">
                    <div class="quicOrdrRght">
                        <p>مشاوره و ثبت سفارش سریع در واتساپ و تلگرام</p>
                        <small>{{ (new \App\Models\Setting())->findByKey('footer-1') }}</small>
                        <a href="{{ (new \App\Models\Setting())->findByKey('footer-2') }}" class="quicOrdrLnk1">
                            <span class="icon-whatsapp_black_24dp"></span>
                        </a>
                        <a href="{{ (new \App\Models\Setting())->findByKey('footer-3') }}" class="quicOrdrLnk2">
                            <span class="icon-telegram-alt"></span>
                        </a>
                    </div>
                    <div class="quicOrdrleft">
                        <span class="material-icons">phone_enabled</span>
                        <small>تماس</small>
                        <p><a href="tel:{{ (new \App\Models\Setting())->findByKey('footer-4') }}">{{ (new \App\Models\Setting())->findByKey('footer-4') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ftrTopRow">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ftrTopList">
                        <div class="ftrTpLstBx">
                            <h6>گلشا</h6>
                            <ul>
                                <li><a href="{{ route('about-us.index') }}">درباره گلشا</a></li>
                                <li><a href="{{ route('contact-us.index') }}">تماس با گلشا</a></li>
                                <li><a href="{{ route('work-with-us.index') }}">همکاری با گلشا</a></li>
                                <li><a href="{{ route('blog.index') }}">اخبار گلشا</a></li>
                            </ul>
                        </div>
                        <div class="ftrTpLstBx">
                            <h6>خدمات مشتریان</h6>
                            <ul>
                                <li><a href="{{ route('faq.index') }}">سوالات متداول</a></li>
                                <li><a href="{{ route('dissatisfaction.index') }}">ثبت نارضایتی</a></li>
                                <li><a href="{{ route('faq.index') }}">حریم خصوصی </a></li>
                            </ul>
                        </div>
                        <div class="ftrTpLstBx">
                            <h6>راهنمای خرید محصولات</h6>
                            <ul>
                                <li><a href="{{ route('faq.index') }}">نحوه ثبت سفارش</a></li>
                                <li><a href="{{ route('faq.index') }}">روش های پرداخت </a></li>
                                <li><a href="{{ route('faq.index') }}">نحوه ارسال سفارشات</a></li>
                                <li><a href="{{ route('faq.index') }}">پیگیری سفارشات</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ftrPaperBox">
                        <img src="{{ asset('assets/front/img/logo4.png') }}" alt="logo">
                        @foreach(\App\Models\BlogPost::query()->latest()->take(4)->get() as $blogPost)
                            <p style="font-size: 12px">
                                <a style="font-size: 12px" href="{{ route('blog.show', $blogPost->id) }}">{{ mb_substr($blogPost->title,0,40) }}...</a>
                            </p>
                        @endforeach
                        <a href="{{ route('blog.index') }}">
                            <i>مقالات بیشتر</i>
                            <span class="material-icons-outlined">arrow_back</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ftrSotialBx">
                        <p>گلشا در شبکه های اجتماعی</p>
                        <ul>
                            <li>
                                <a href="{{ (new \App\Models\Setting())->findByKey('footer-6') }}">
                                    <span class="icon-telegram-alt"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ (new \App\Models\Setting())->findByKey('footer-7') }}">
                                    <span class="icon-bxl-instagram"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ (new \App\Models\Setting())->findByKey('footer-8') }}">
                                    <span class="icon-twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ (new \App\Models\Setting())->findByKey('footer-9') }}">
                                    <img src="{{ asset('assets/front/img/aparat.png') }}" alt="img">
                                </a>
                            </li>
                        </ul>
                    </div>
                   @livewire('front.footer.subscribe-form')
                </div>
            </div>
        </div>
    </div>
    <div class="ftrAbout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftrAboutBx">
                        <a href="#" class="ftrAbutLogo">
                            <img src="{{ asset('assets/front/img/logo3.png') }}" alt="logo">
                        </a>
                        <div class="ftrAboutTxt">
                            <h5>{{ (new \App\Models\Setting())->findByKey('footer-10') }}</h5>
                            <p>
                                {{ (new \App\Models\Setting())->findByKey('footer-11') }}
                            </p>
                        </div>
                        <div class="ftrAbutLnks">
                            <script src="https://www.zarinpal.com/webservice/TrustCode" type="text/javascript"></script>
                            <a>
                                <img referrerpolicy='origin' id = 'rgvjjxlzwlaonbqesizpsizp' style = 'cursor:pointer' onclick = 'window.open("https://logo.samandehi.ir/Verify.aspx?id=314299&p=xlaorfthaodsuiwkpfvlpfvl", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt = 'logo-samandehi' src = 'https://logo.samandehi.ir/logo.aspx?id=314299&p=qftinbpdshwlodrfbsiybsiy' />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ftrClintRow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftrClintBx">
                        <ul>
                            <li>
                                <a href="{{ (new \App\Models\Setting())->findByKey('footer-12') }}">
                                    <img src="{{ (new \App\Models\Setting())->findByKey('footer-13') }}" alt="img">
                                </a>
                            </li>
                            <li>
                                <a href="{{ (new \App\Models\Setting())->findByKey('footer-14') }}">
                                    <img src="{{ (new \App\Models\Setting())->findByKey('footer-15') }}" alt="img">
                                </a>
                            </li>
                            <li>
                                <a href="{{ (new \App\Models\Setting())->findByKey('footer-16') }}">
                                    <img src="{{ (new \App\Models\Setting())->findByKey('footer-17') }}" alt="img">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ftrCpyRight">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <span>کلیه مطالب این وب سایت متعلق به فروشگاه اینترنتی </span>
                        <a href="{{ route('home') }}">گلشا</a>
                        <span>بوده و استفاده از آنها برای مقاصد غیر تجاری و با ذکر منبع بلامانع است</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
