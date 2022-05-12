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
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="firstName" class="control-label">نام</label>
                                                <div class="">
                                                    <input disabled wire:model="title" type="text" class="form-control" id="title" placeholder="نام را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">آپلود تصویر</label>
                                                <input type="file" class="form-control" wire:model="image">
                                                <div wire:loading wire:target="image">در حال آپلود تصویر</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                @if($image)
                                                    <img style="width: 200px" class="img-fluid img-bordered" src="{{ $image->temporaryUrl() }}" alt="Photo">
                                                @elseif($oldImage)
                                                    <img style="width: 200px" class="img-fluid img-bordered" src="{{ $oldImage }}" alt="Photo">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="button" class="btn btn-info"  wire:click.prevent="update()">ثبت</button>
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


