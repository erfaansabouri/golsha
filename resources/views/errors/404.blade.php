<!DOCTYPE html>
<html lang="fa">
@include('front-pages.partials.head')

<body>

<section id="notFoundSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="notFoundBox">
                    <h1>خطای 404</h1>
                    <div class="notFoundImg">
                        <img src="{{ asset('assets/front/img/not-found.png') }}" alt="img">
                    </div>
                    <p>
                        صفحه مورد نظر شما وجود ندارد یا حذف شده است
                    </p>
                    <a href="{{ route('home') }}">بازگشت به صفحه اصلی</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="hdrSubMnuBox"></div>
<div class="hdrSrchSubBx"></div>


</body>
</html>
