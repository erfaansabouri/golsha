@extends('app')
@section('content')
    <section id="ordersSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="orderSecBox">
                        @include('front-pages.profile.profile-right-bar')
                        <div class="ordrsMain">
                            <div class="ifoAndAdrsBx">
                                <div class="ifoAndAdrsTtl">اطلاعات و آدرس ها</div>
                                <div class="infoAdrsForm">
                                    <form action="{{ route('user.profile.updateDetails') }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-inline mb-2">
                                            <div class="form-group mb-2">
                                                <div class="formGroupDiv">
                                                    <label for="nameInp" class="infoAdrsLabl">نام:</label>
                                                    <input name="first_name" type="text" class="infoAdrsInpt" id="nameInp" value="{{ $user->first_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="formGroupDiv">
                                                    <label for="nameInp" class="infoAdrsLabl">نام خانوادگی:</label>
                                                    <input name="last_name" type="text" class="infoAdrsInpt" id="nameInp" value="{{ $user->last_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="formGroupDiv">
                                                    <label for="numInp" class="infoAdrsLabl">شماره تماس:</label>
                                                    <input disabled type="text" class="infoAdrsInpt" id="numInp" value="{{ $user->phone_number }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mb-2">
                                            <div class="form-group mb-2">
                                                <div class="formGroupDiv formGrpRadDiv">
                                                    <p class="sexInptLbl">جنسیت:</p>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="customRadio" name="sex" value="female" @if($user->sex == 'female') checked @endif>
                                                        <label class="custom-control-label" for="customRadio"><p>زن</p> </label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="customRadio2" name="sex" value="male" @if($user->sex == 'male') checked @endif>
                                                        <label class="custom-control-label" for="customRadio2"><p>مرد</p></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="formGroupDiv">
                                                    <label for="datepicker1" class="infoAdrsLabl">تاریخ تولد:</label>
                                                    <input id="birthday" name="birthday" type="text" placeholder="{{ $user->birthday }}"  value="{{ $user->birthday }}" class="form-control infoAdrsInpt DPfromTo1 usage"  aria-label="date1" aria-describedby="date1">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="formGroupDiv">
                                                    <label for="cartInp" class="infoAdrsLabl">شماره کارت:</label>
                                                    <input value="{{ $user->bank_card }}" name="bank_card" type="text" class="form-control infoAdrsInpt" id="cartInp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline">
                                            <button type="submit" class="AddrsInfoBtn saveInfoBtn">ذخیره تغییرات</button>
                                        </div>
                                    </form>
                                    <div class="yourAdrssBox">
                                        <div class="yourAdrsTtl">
                                            <span class="icon-location_on_black_24dp"></span>
                                            <i>آدرس های شما</i>
                                            <button class="mr-3 btn btn-success btn-sm" type="button"  data-toggle="modal" data-target="#create-address">ثبت آدرس جدید</button>

                                        </div>
                                        <ul class="yourAdrsList">
                                            @foreach($user->addresses()->get() as $address)
                                                <li>
                                                    <div class="yourAdrssBdy">
                                                        <h6>{{ $address->receiver_name }}</h6>
                                                        <p>{{ $address->full }}</p>
                                                        <span>{{ $address->phone_number }}</span>
                                                    </div>
                                                    <div class="yourAdrssBtn">
                                                        <a data-toggle="modal" data-target="#edit-address-{{ $address->id }}">ویرایش آدرس</a>
                                                        <a href="{{ route('user.profile.destroyAddress', $address->id) }}">حذف آدرس</a>
                                                    </div>
                                                </li>

                                                <div class="modal" id="edit-address-{{ $address->id }}">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">ثبت آدرس جدید</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('user.profile.updateAddress', $address->id) }}" method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="form-group">
                                                                        <label for="comment">نام گیرنده:</label>
                                                                        <input value="{{ $address->receiver_name }}" type="text" class="form-control" name="receiver_name" placeholder="نام گیرنده را وارد کنید.">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="comment">شماره تماس گیرنده:</label>
                                                                        <input value="{{ $address->phone_number }}" type="text" class="form-control" name="phone_number" placeholder="شماره تماس گیرنده را وارد کنید.">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="comment">کشور:</label>
                                                                        <input value="{{ $address->country }}" type="text" class="form-control" name="country" placeholder="کشور را وارد کنید.">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="comment">استان:</label>
                                                                        <input value="{{ $address->state }}" type="text" class="form-control" name="state" placeholder="استان را وارد کنید.">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="comment">شهر:</label>
                                                                        <input value="{{ $address->city }}" type="text" class="form-control" name="city" placeholder="شهر را وارد کنید.">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="comment">آدرس:</label>
                                                                        <textarea  type="text" class="form-control" name="first_line" placeholder="آدرس را وارد کنید.">{{ $address->first_line }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="comment">توضیحات:</label>
                                                                        <textarea type="text" class="form-control" name="second_line" placeholder="توضیحات را وارد کنید.">{{ $address->second_line }}</textarea>
                                                                    </div>
                                                                    <button class="btn btn-success btn-sm" type="submit">ثبت آدرس</button>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal" id="create-address">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">ثبت آدرس جدید</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('user.profile.storeAddress') }}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <div class="form-group">
                                                            <label for="comment">نام گیرنده:</label>
                                                            <input type="text" class="form-control" name="receiver_name" placeholder="نام گیرنده را وارد کنید.">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="comment">شماره تماس گیرنده:</label>
                                                            <input type="text" class="form-control" name="phone_number" placeholder="شماره تماس گیرنده را وارد کنید.">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="comment">کشور:</label>
                                                            <input type="text" class="form-control" name="country" placeholder="کشور را وارد کنید.">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="comment">استان:</label>
                                                            <input type="text" class="form-control" name="state" placeholder="استان را وارد کنید.">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="comment">شهر:</label>
                                                            <input type="text" class="form-control" name="city" placeholder="شهر را وارد کنید.">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="comment">آدرس:</label>
                                                            <textarea type="text" class="form-control" name="second_line" placeholder="آدرس را وارد کنید."></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="comment">توضیحات:</label>
                                                            <textarea type="text" class="form-control" name="second_line" placeholder="توضیحات را وارد کنید."></textarea>
                                                        </div>
                                                        <button class="btn btn-success btn-sm" type="submit">ثبت آدرس</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('head')

    <link rel="stylesheet" href="{{ asset('assets/persian-dp/css/persianDatepicker-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/persian-dp/css/persianDatepicker-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/persian-dp/css/persianDatepicker-latoja.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/persian-dp/css/persianDatepicker-melon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/persian-dp/css/persianDatepicker-lightorang.css') }}" />

@endsection

@section('scripts')
    <script src="{{ asset('assets/persian-dp/js/persianDatepicker.js') }}"></script>
    <script>
        $(function () {
            $(".usage").persianDatepicker({
                formatDate: "YYYY-MM-DD"
            });
        });
    </script>
@endsection
