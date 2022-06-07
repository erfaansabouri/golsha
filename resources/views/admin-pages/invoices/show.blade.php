@extends('admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>جزئیات سفارش</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <div class="row">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>عملیات موفقیت آمیز بود!</strong> {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">قیمت کل سفارش</h3>
                            </div>
                            <div class="card-body">{{ number_format($record->totalPrice()) }} تومان</div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">کاربر</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.users.edit', @$record->user->id ?? 0) }}">
                                    {{ @$record->user->full_name }} ({{ @$record->user->phone_number }})
                                </a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">آدرس</h3>
                            </div>
                            <div class="card-body">{{ @$record->address->full ?? '-'}}</div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">اطلاعات تحویل گیرنده</h3>
                            </div>
                            <div class="card-body">{{ @$record->address->receiver_name }} ({{ @$record->address->phone_number }})</div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">اطلاعات تحویل گیرنده</h3>
                            </div>
                            <div class="card-body">{{ @$record->address->receiver_name }} ({{ @$record->address->phone_number }})</div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">وضعیت</h3>
                            </div>
                            <div class="card-body">
                                {{ $record->status }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">شیوه ارسال</h3>
                            </div>
                            <div class="card-body">
                                {{ $record->delivery_type }} ({{ number_format($record->delivery_amount) }}تومان)
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">تاریخ پرداخت</h3>
                            </div>
                            <div class="card-body">
                                {{ $record->paid_at ? verta($record->paid_at)->format('%d %B %Y - H:i') : '-' }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="callout callout-info">
                            <h5>اطلاعات پرداخت</h5>
                            <p>
                                شماره پیگیری: {{ $record->tracking_code }}
                            </p>
                            <p>
                                کارت به نام: {{ $record->card_owner_name }}
                            </p>
                            <p>
                                شماره کارت: {{ $record->card_number }}
                            </p>
                            <p>
                                بانک: {{ $record->bank_name }}
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="callout callout-info">
                            <h5>تغییر وضعیت سفارش</h5>
                            <a href="{{ route('admin.invoices.accept', $record->id) }}" class="btn btn-success btn-block d-block">تکمیل کردن</a>
                            <a href="{{ route('admin.invoices.cancel', $record->id) }}" class="btn btn-danger btn-block d-block">لغو کردن</a>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">سفارش {{ $record->unique_code }}</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card">
                                <div class="card-body p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                        <tr>
                                            <th>نام محصول</th>
                                            <th>قیمت خام هر واحد</th>
                                            <th>قیمت با تخفیف هر واحد</th>
                                            <th>تعداد</th>
                                            <th>قیمت کل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($record->products()->get() as $invoiceProduct)
                                            <tr>
                                                <td>
                                                    <img src="{{ $invoiceProduct->productInfo->first_image_path }}" alt="عکس محصول" class="img-circle img-size-32 mr-2">
                                                    <a href="{{ route('products.show', $invoiceProduct->productInfo->id) }}">
                                                        {{ $invoiceProduct->productInfo->title }} (#{{ $invoiceProduct->productInfo->id }})
                                                    </a>
                                                </td>
                                                <td>{{ number_format($invoiceProduct->product_original_price) }} تومان</td>
                                                <td>{{ number_format($invoiceProduct->product_purchase_price) }} تومان</td>
                                                <td>{{ $invoiceProduct->count }}</td>
                                                <td>{{ number_format($invoiceProduct->total_purchase_price) }} تومان</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
