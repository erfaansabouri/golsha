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
                        <div class="loginFormHdr">
                            <a href="#">
                                <span class="material-icons-outlined">arrow_forward</span>
                            </a>
                            <h2>ورود یا ثبت نام</h2>
                        </div>
                        <div class="loginFormLbl">کد برای شماره {{ $user->phone_number }} ارسال شد</div>
                        <div class="loginFormLbl">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger">{{$error}}</div>
                                @endforeach
                            @endif
                        </div>
                        <div class="loginFormLbl">
                            رمز ورود جهت تست سیستم : {{ $user->otp }}
                        </div>
                        <form method="post" action="{{ route('user.auth.validateOTPAndLogin') }}">
                            @csrf
                            @method('post')
                            <div class="input-group timerInput">
                                <input name="otp" type="tel" class="form-control" placeholder="کد تایید">
                                <input  name="user_id" type="hidden" class="form-control" value="{{ $user->id }}">
                                <div class="input-group-append">
										<span class="input-group-text">
											<div id="countdown"></div>
											<span class="icon-history_black_24dp"></span>
										</span>
                                </div>
                            </div>
                            <a href="{{ route('user.auth.login.form') }}" class="editPhonLink">ویرایش شماره</a>
                            <button type="submit">بررسی کد</button>
                            <!-- <button class="mt-2">ارسال مجدد کد</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="hdrSubMnuBox"></div>
<div class="hdrSrchSubBx"></div>

@include('front-pages.partials.scripts')

</body>
</html>
