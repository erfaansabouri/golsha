<ul class="qNotFoundUl">
    <li class="qNotFoundLi">
        <div class="qNtFndCrdImg">
            <img src="{{ asset('assets/front/img/icon1.png') }}" alt="img">
            <p>شبکات اجتماعی</p>
        </div>
        <ul class="qNtFndCrdStial">
            <li>
                <a href="{{ (new \App\Models\Setting())->findByKey('footer-6') }}">
                    <span class="icon-telegram-alt"></span>
                    <i>پاسخگویی در تلگرام</i>
                </a>
            </li>
            <li>
                <a href="{{ (new \App\Models\Setting())->findByKey('footer-7') }}">
                    <span class="icon-whatsapp_black_24dp"></span>
                    <i>پاسخگویی در واتسپ</i>
                </a>
            </li>
        </ul>
    </li>
    <li class="qNotFoundLi">
        <div class="qNtFndCrdImg">
            <img src="{{ asset('assets/front/img/icon2.png') }}" alt="img">
            <p>تماس تلفنی</p>
        </div>
        <ul class="qNtFndCrdSCall">
            <li>
                <span>{{ (new \App\Models\Setting())->findByKey('socials-4') }}</span>
                <a href="{{ (new \App\Models\Setting())->findByKey('socials-5') }}">تماس</a>
            </li>
            <li>
                <span>{{ (new \App\Models\Setting())->findByKey('socials-6') }}</span>
                <a href="{{ (new \App\Models\Setting())->findByKey('socials-7') }}">تماس</a>
            </li>
        </ul>
    </li>
    <li class="qNotFoundLi">
        <div class="qNtFndCrdImg">
            <img src="{{ asset('assets/front/img/icon3.png') }}" alt="img">
            <p>ایمیل</p>
        </div>
        <div class="qNtFndSndEmail">
            <span>ایمیل سازمانی {{ (new \App\Models\Setting())->findByKey('socials-8') }}</span>
            <a href="{{ (new \App\Models\Setting())->findByKey('socials-9') }}">ارسال ایمیل</a>
        </div>
    </li>
</ul>