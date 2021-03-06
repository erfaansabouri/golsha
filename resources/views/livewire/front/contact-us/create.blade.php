<div>
    <section id="frqntlyQuSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contctUsBox">
                        <div class="contctUsTitl">
                            <h3>{{ $formType ?? 'تماس با ما' }}</h3>
                            <p>
                                <i>شنونده صدای گرمتان هستیم</i>
                                <span class="icon-favorite_black_24dp"></span>
                            </p>
                        </div>
                        <div class="contctUsNtic">
                            <span class="icon-exclamation-mark-round"></span>
                            <p>لطفاً پیش از ارسال ایمیل یا تماس تلفنی، ابتدا  <a href="{{ route('faq.index') }}">پرسش های متداول</a>    را مشاهده کنید</p>
                        </div>
                        <div class="contctUsForm">
                            <div class="cntctFrmTitl">فرم ارسال پیام</div>
                            @if (session()->has('message'))
                                <div style="direction: rtl" class="text-right mb-2 alert alert-success">
                                    <span class="">
                                        {{ session('message') }}
                                    </span>
                                </div>
                            @endif
                            @error('fullName')
                            <div style="direction: rtl" class="text-right mb-2 alert alert-danger">
                                <span class="">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                            @error('phoneNumber')
                            <div style="direction: rtl" class="text-right mb-2 alert alert-danger">
                                <span class="">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                            @error('message')
                            <div style="direction: rtl" class="text-right mb-2 alert alert-danger">
                                <span class="">
                                    {{ $message }}
                                </span>
                            </div>
                            @enderror
                            <form>
                                <div class="form-inline mb-2">
                                    <div class="form-group mb-2">
                                        <div class="formGroupDiv">
                                            <label for="nameInp" class="infoAdrsLabl">نام و نام خانوادگی <span class="icon-asterisk"></span></label>
                                            <input required wire:model.defer="fullName" type="text" class="infoAdrsInpt" id="nameInp">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="formGroupDiv">
                                            <label for="numInp" class="infoAdrsLabl">شماره تماس <span class="icon-asterisk"></span></label>
                                            <input required wire:model.defer="phoneNumber" type="text" class="infoAdrsInpt" id="numInp">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="formGroupDiv">
                                            <label for="emailInp" class="infoAdrsLabl">ایمیل</label>
                                            <input wire:model.defer="email" type="email" class="infoAdrsInpt" id="emailInp">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-inline mb-2">
                                    <div class="formTAreaDiv">
                                        <label for="tAreaInpt" class="infoAdrsLabl">متن پیام  <span class="icon-asterisk"></span></label>
                                        <textarea required wire:model.defer="message" rows="10" id="tAreaInpt" class="infoAdrsArea"></textarea>
                                    </div>
                                </div>
                                <div class="form-inline mb-2">
                                    <button class="btn btn-success " wire:click.prevent="store">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="qNotFoundBox">
                        <div class="qNotFondTxt">
                            <h6>اطلاعات تماس</h6>
                            <p>ساعات پاسخگویی شنبه تا جمعه ۱۰ الی ۲۱ به جز ایام تعطیل رسمی</p>
                        </div>
                        @include('front-pages.partials.socials')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
