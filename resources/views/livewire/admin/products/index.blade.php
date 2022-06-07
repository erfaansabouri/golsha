<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $pageInfo['title'] }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success float-sm-left">تعریف محصول جدید</a>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $pageInfo['title'] }}</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input wire:model.lazy="search" type="text" name="" class="form-control float-right" placeholder="جستجو">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شناسه</th>
                                        <th>تصویر</th>
                                        <th>عنوان محصول</th>
                                        <th>فروشنده</th>
                                        <th>قیمت (تومان)</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td><img class="img-fluid img-thumbnail img-size-64" src="{{ $product->firstImage() ? $product->firstImage()->path : '' }}" alt="تصویر"></img></td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->seller_name }}</td>
                                            @if($product->price == $product->purchase_price)
                                                <td>{{ number_format($product->price) }}</td>
                                            @else
                                                <td><strike>{{ number_format($product->price) }}</strike> {{ number_format($product->purchase_price) }}</td>
                                            @endif
                                            <td><a class="btn btn-sm btn-primary" href="{{ route('admin.products.edit', $product->id) }}">ویرایش</a>
                                            <a class="btn btn-sm btn-danger" href="{{ route('admin.products.destroy', $product->id) }}">حذف</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        {{ $products->links() }}
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
