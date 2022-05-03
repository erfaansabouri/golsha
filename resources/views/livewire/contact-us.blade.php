<div>
    <div>
        {{-- Form --}}
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h3>تماس با ما <small>شنونده صدای گرمتان هستیم <i class="la la-heart text-success"></i></small></h3>
            <p class="lead"><i class="la la-exclamation-circle"></i> لطفا پیش از ارسال ایمیل یا تماس تلفنی، ابتدا پرسش
                های متداول را مطالعه کنید.</p>

            <div class="border border-secondary rounded p-3 shadow">
                <form wire:submit.prevent="store">
                    <h4 class="text-right">فرم ارسال پیام</h4>
                    <div class="form-row">
                        <div class="col-lg-4 col-sm-12 form-group">
                            <input wire:model="fullName" type="text" class="form-control" placeholder="نام و نام خانوادگی">
                            @error('fullName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-lg-4 col-sm-12 form-group">
                            <input wire:model="phoneNumber" type="text" class="form-control" placeholder="شماره تماس">
                            @error('phoneNumber') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-lg-4 col-sm-12 form-group">
                            <input wire:model="email" type="text" class="form-control" placeholder="ایمیل">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 form-group">
                            <textarea placeholder="متن پیام" wire:model="message" id="" cols="30" rows="10" class="form-control"></textarea>
                            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">ارسال</button>
                </form>
            </div>

        </div>
        <hr>
        {{-- Contact us text --}}
        <div>
            <p>
                <b>اطلاعات تماس</b>
                <span>ساعات پاسخ گویی شنبه تا جمعه ساعت 9 الی 21 به جز تعطیلی های رسمی</span>
            </p>
        </div>
        {{-- Contact us cards desktop--}}
        <div class="row mb-3">
            <div class="golshateb-bg-grey contact-us-section-desktop col-12">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 box-shadow contact-us-card">
                        <div class="card-body">
                            <img class="mb-2" src="{{ asset('assets/image/logo.svg') }}" alt="">
                            <h4 class="card-title contact-us-card-title">شبکات اجتماعی</h4>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="mb-2">
                                    <button class="btn btn-sm btn-success w-50"><i class="la la-2x la-whatsapp"></i>واتساپ
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-sm btn-info w-50"><i class="la la-2x la-telegram"></i>تلگرام
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4 box-shadow contact-us-card">
                        <div class="card-body">
                            <img class="mb-2" src="{{ asset('assets/image/logo.svg') }}" alt="">
                            <h4 class="card-title contact-us-card-title">تماس تلفنی</h4>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="mb-2">09129995566
                                    <button class="btn btn-sm btn-outline-success">تماس</button>
                                </li>
                                <li>09129995566
                                    <button class="btn btn-sm btn-outline-success">تماس</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4 box-shadow contact-us-card">
                        <div class="card-body">
                            <img class="mb-2" src="{{ asset('assets/image/logo.svg') }}" alt="">
                            <h4 class="card-title contact-us-card-title">ایمیل سازمانی</h4>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>info@golshateb.com</li>
                                <li class="mt-2"><a href="" class="btn btn-sm btn-outline-success">ارسال ایمیل</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
