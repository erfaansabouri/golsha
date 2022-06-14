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
                                                <label for="firstName" class="control-label">نام</label>
                                                <div class="">
                                                    <input wire:model="firstName" type="text" class="form-control" id="firstName" placeholder="نام را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="lastName" class="control-label">نام خانوادگی</label>
                                                <div class="">
                                                    <input wire:model="lastName" type="text" class="form-control" id="lastName" placeholder="نام خانوادگی را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="phoneNumber" class="control-label">شماره تماس</label>
                                                <div class="">
                                                    <input wire:model="phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="شماره تماس را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="sex" class="control-label">جنسیت</label>
                                                <div class="">
                                                    <input wire:model="sex" type="text" class="form-control" id="sex" placeholder="جنسیت را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="email" class="control-label">ایمیل</label>
                                                <div class="">
                                                    <input wire:model="email" type="text" class="form-control" id="email" placeholder="ایمیل را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="button" class="btn btn-info"  wire:click.prevent="update({{ $record->id }})">ویرایش اطلاعات فردی</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form">
                                <div class="card-body">
                                    @if($record->is_disable)
                                        <button type="button" class="btn btn-success"  wire:click.prevent="toggleIsDisable({{ $record->id }})">آزاد سازی کاربر</button>
                                    @else
                                        <button type="button" class="btn btn-dark"  wire:click.prevent="toggleIsDisable({{ $record->id }})">مسدود کردن کاربر</button>
                                    @endif

                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
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

        </script>
    @endpush
</div>


