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
                                                    <input wire:model="title" type="text" class="form-control" id="title" placeholder="عنوان محصول را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="seller_name" class="control-label">نام فروشنده</label>
                                                <div class="">
                                                    <input wire:model="sellerName" type="text" class="form-control" id="seller_name" placeholder="نام فروشنده را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>برخی ترکیبیات</label>
                                                <textarea wire:model="ingredients" class="form-control" rows="3" placeholder="وارد کردن برخی ترکیبیات ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>حجم</label>
                                                <textarea wire:model="size" class="form-control" rows="3" placeholder="وارد کردن حجم ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>خواص</label>
                                                <textarea wire:model="virtues" class="form-control" rows="3" placeholder="وارد کردن خواص ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>معرفی</label>
                                                <textarea wire:model="introduction" class="form-control" rows="3" placeholder="وارد کردن معرفی ..."></textarea>
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
                                                    <input wire:keyup="updatePurchasePrice" wire:model="price" type="text" class="form-control" id="price" placeholder="قیمت به تومان را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="discount_percentage" class="control-label">درصد تخفیف (بین 0 تا 100)</label>
                                                <div class="">
                                                    <input wire:keyup="updatePurchasePrice" wire:model="discountPercentage" type="number" min="1" max="100" class="form-control" id="discount_percentage" placeholder="درصد تخفیف را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="text-danger">قیمت نهایی با احتساب تخفیف : {{ $purchasePrice }} تومان</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h4>مشخصات محصول</h4>
                                        </div>
                                        <div class="col">
                                            <button class="btn text-white btn-primary float-left" wire:click.prevent="appendProductAttribute({{ $productAttributeCounter }})">اضافه</button>
                                        </div>
                                    </div>
                                    @foreach($productAttributeInputs as $k => $v)
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="control-label">عنوان مشخصه</label>
                                                    <div class="">
                                                        <input required wire:model="attributeKey.{{ $v }}" type="text" class="form-control" placeholder="عنوان مشخصه را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="control-label">مقدار مشخصه</label>
                                                    <div class="">
                                                        <input required wire:model="attributeValue.{{ $v }}" type="text" class="form-control" placeholder="مقدار مشخصه را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="control-label">-</label>
                                                    <button class="btn text-white btn-danger btn-block" wire:click.prevent="removeProductAttribute({{ $k }})">حذف</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h4>سوالات متداول</h4>
                                        </div>
                                        <div class="col">
                                            <button class="btn text-white btn-primary float-left" wire:click.prevent="appendProductFaq({{$productFaqCounter}})">اضافه</button>
                                        </div>
                                    </div>
                                    @foreach($productFaqInputs as $k => $v)
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="control-label">سوال</label>
                                                    <div class="">
                                                        <input required wire:model="faqQuestion.{{ $v }}" type="text" class="form-control" placeholder="سوال را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="control-label">جواب</label>
                                                    <div class="">
                                                        <input required wire:model="faqAnswer.{{ $v }}" type="text" class="form-control" placeholder="جواب را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="control-label">-</label>
                                                    <button class="btn text-white btn-danger btn-block" wire:click.prevent="removeProductFaq({{ $k }})">حذف</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
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
                initialValueType: 'gregorian',
                onSelect: function(unix){
                    console.log('discountStartedAt select : ' + unix);
                    @this.set('discountStartedAt', unix, true);
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


