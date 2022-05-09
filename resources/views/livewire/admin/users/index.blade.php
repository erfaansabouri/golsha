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
                                        <th>نام</th>
                                        <th>شماره تماس</th>
                                        <th>جنسیت</th>
                                        <th>ایمیل</th>
                                        <th>تاریخ تولد</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->sex }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->shamsi_birthday }}</td>
                                            <td><a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}">ویرایش</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        {{ $users->links() }}
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
