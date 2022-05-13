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
                                        <th>عنوان</th>
                                        <th>متن</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->title }}</td>
                                            <td>{{ $comment->body }}</td>
                                            <td>{{ $comment->created_at_jalali }}</td>
                                            <td><span class="badge {{ $comment->verified_badge }}">{{ $comment->verified_status }}</span></td>
                                            <td><button data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" class="btn btn-sm btn-primary">ویرایش</button></td>
                                        </tr>

                                        <div class="modal" id="comment-modal-{{ $comment->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">ویرایش نظر {{ $comment->id }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="callout callout-danger">
                                                            <h5>{{ $comment->title }}</h5>
                                                            <p>{{ $comment->body }}</p>
                                                        </div>
                                                        <div class="callout callout-success">
                                                            <h5>{{ $comment->morph_type }}</h5>
                                                            <a href="{{ route('admin.products.edit', $comment->commentable->id) }}">
                                                                <p class="text-info">{{ $comment->commentable->title }} ( {{ $comment->commentable->id }} )</p>
                                                            </a>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>پاسخ مدیر</label>
                                                            <textarea wire:model.defer="answer" class="form-control" rows="3" placeholder="وارد کردن پاسخ ..."></textarea>
                                                        </div>
                                                        <button wire:click="answer({{ $comment->id }})"  class="btn btn-success" data-dismiss="modal">ثبت پاسخ</button>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label>پاسخ قبلی</label>
                                                            <p>
                                                                {{ $comment->answer ? $comment->answer->body : '' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button wire:click="accept({{ $comment->id }})" class="btn btn-success" data-dismiss="modal">تایید کردن نظر</button>
                                                        <button wire:click="decline({{ $comment->id }})" class="btn btn-dark" data-dismiss="modal">رد کردن نظر</button>
                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">بستن</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
