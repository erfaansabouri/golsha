<div>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $pageInfo['title'] }}</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title" class="control-label">عنوان محصول</label>
                                                <div class="">
                                                    <input type="text" class="form-control" id="title" placeholder="عنوان محصول را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="seller_name" class="control-label">نام فروشنده</label>
                                                <div class="">
                                                    <input type="text" class="form-control" id="seller_name" placeholder="نام فروشنده را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>برخی ترکیبیات</label>
                                                <textarea class="form-control" rows="3" placeholder="وارد کردن برخی ترکیبیات ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>حجم</label>
                                                <textarea class="form-control" rows="3" placeholder="وارد کردن حجم ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>خواص</label>
                                                <textarea class="form-control" rows="3" placeholder="وارد کردن خواص ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>معرفی</label>
                                                <textarea class="form-control" rows="3" placeholder="وارد کردن معرفی ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>قیمت و تخفیف</h4>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="price" class="control-label">قیمت به تومان</label>
                                                <div class="">
                                                    <input type="text" class="form-control" id="price" placeholder="قیمت به تومان را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="discount_percentage" class="control-label">درصد تخفیف (بین 0 تا 100)</label>
                                                <div class="">
                                                    <input type="number" min="1" max="100" class="form-control" id="discount_percentage" placeholder="درصد تخفیف را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>انتخاب تاریخ شروع تخفیف:</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input  id="discountStartedAt" type="text" class="form-control" placeholder="تاریخ "  wire:model.defer="discountStartedAt">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>انتخاب تاریخ پایان تخفیف:</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input  id="discountEndedAt" type="text" class="form-control" placeholder="تاریخ "  wire:model.defer="discountEndedAt">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>مشخصات محصول</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="product_attribute_key_1" class="control-label">عنوان مشخصه</label>
                                                <div class="">
                                                    <input type="text" class="form-control" id="product_attribute_key_1" placeholder="عنوان مشخصه را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="product_attribute_value_1" class="control-label">مقدار مشخصه</label>
                                                <div class="">
                                                    <input type="text" class="form-control" id="product_attribute_value_1" placeholder="مقدار مشخصه را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($productAttributeInputs as $k => $v)
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="product_attribute_key_{{$v}}" class="control-label">{{$v}}عنوان مشخصه</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="product_attribute_key_{{$v}}" placeholder="عنوان مشخصه را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="product_attribute_value_{{$v}}" class="control-label">مقدار مشخصه</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="product_attribute_value_{{$k}}" placeholder="مقدار مشخصه را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="control-label">-</label>
                                                    <button class="btn text-white btn-danger btn-block" wire:click.prevent="removeProductAttribute({{$k}})">حذف</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="appendProductAttribute({{$productAttributeCounter}})">اضافه</button>
                                    <hr>
                                    <h4>سوالات متداول</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="product_faq_question_1" class="control-label">سوال</label>
                                                <div class="">
                                                    <input type="text" class="form-control" id="product_faq_question_1" placeholder="سوال را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="product_faq_answer_1" class="control-label">جواب</label>
                                                <div class="">
                                                    <input type="text" class="form-control" id="product_attribute_value_1" placeholder="جواب را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($productFaqInputs as $k => $v)
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="product_faq_question_{{$v}}" class="control-label">سوال</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="product_faq_question_{{$v}}" placeholder="سوال را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="product_faq_answer_{{$v}}" class="control-label">جواب</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="product_faq_answer_{{$k}}" placeholder="جواب را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="control-label">-</label>
                                                    <button class="btn text-white btn-danger btn-block" wire:click.prevent="removeProductFaq({{$k}})">حذف</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="appendProductFaq({{$productFaqCounter}})">اضافه</button>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="button" class="btn btn-info"  wire:click.prevent="store()">ورود</button>
                                    <button type="submit" class="btn btn-default float-left">لغو</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#discountStartedAt").persianDatepicker({
                format: 'YYYY/MM/DD',
                initialValue: false,
                onSelect: function(unix){
                    console.log('discountStartedAt select : ' + unix);
                    @this.set('discountUnixStartedAt', unix, true);
                }

            });
            $("#discountEndedAt").persianDatepicker({
                format: 'YYYY/MM/DD',
                initialValue: false,
                onSelect: function(unix){
                    console.log('discountEndedAt select : ' + unix);
                    @this.set('discountUnixEndedAt', unix, true);
                }

            });
        });
    </script>
@endpush
</div>


