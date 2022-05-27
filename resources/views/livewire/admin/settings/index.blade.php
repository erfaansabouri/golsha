<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $pageInfo['title'] }}</h1>
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
        <section class="content min-vh-100">
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
                                        <th>کلید</th>
                                        <th>مقدار</th>
                                        <th>نوع</th>
                                        <th>دسته</th>
                                        <th>ویرایش</th>
                                    </tr>
                                    @foreach($settings as $setting)
                                        <tr>
                                            <td>{{ $setting->id }}</td>
                                            <td>{{ $setting->key }}</td>
                                            @if($setting->type == \App\Models\Setting::TYPES['text'])
                                                <td>{{ $setting->value_preview }}</td>
                                            @endif
                                            @if($setting->type == \App\Models\Setting::TYPES['image'])
                                                <td>
                                                    <img class="img-fluid img-thumbnail img-size-64" src="{{ $setting->value_preview }}" alt="">
                                                </td>
                                            @endif
                                            <td>{{ \App\Models\Setting::translateType($setting->type) }}</td>
                                            <td>{{ \App\Models\Setting::translateCategories($setting->category) }}</td>
                                            <td><a class="btn btn-sm btn-primary" href="{{ route('admin.settings.edit', $setting->id) }}">ویرایش</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        {{ $settings->links() }}
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
