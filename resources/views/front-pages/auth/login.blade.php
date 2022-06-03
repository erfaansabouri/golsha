<!DOCTYPE html>
<html lang="fa">
@include('front-pages.partials.head')

<body>

<section id="loginSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="loginSecBox">
                    <div class="loginBxLogo">
                        <img src="{{ asset('assets/front/img/logo1.png') }}" alt="logo">
                    </div>
                    <div class="loginForm">
                        <h2>ورود یا ثبت نام</h2>
                        <div class="loginFormLbl">لطفا شماره موبایل خود را وارد کنید تا کد تایید برایتان ارسال شود</div>
                        <div class="loginFormLbl">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger">{{$error}}</div>
                                @endforeach
                            @endif
                        </div>
                        <form method="post" action="{{ route('user.auth.sendOTP') }}">
                            @csrf
                            @method('post')
                            <div class="input-group mb-5 phoneInput">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="icon-phone_iphone_black_24dp"></span>
                                    </span>
                                </div>
                                <input name="phone_number" type="text" class="form-control" placeholder="شماره موبایل">
                            </div>
                            <button>ارسال کد تایید</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="hdrSubMnuBox"></div>
<div class="hdrSrchSubBx"></div>


</body>
</html>
