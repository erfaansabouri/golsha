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
                                                <label for="title" class="control-label">عنوان</label>
                                                <div class="">
                                                    <input wire:model="title" type="text" class="form-control" id="title" placeholder="عنوان را وارد کنید">
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
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="body" class="control-label">متن</label>
                                                <div wire:ignore>
                                                    <textarea rows="10" wire:model.defer="body" type="text" class="form-control" id="body" placeholder="متن را وارد کنید">
                                                        {{ $body }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="body" class="control-label">تگ ها (برای جدا کردن تگ ها از کاما "،" استفاده نمایید.)</label>
                                                <div wire:ignore>
                                                    <input rows="10" wire:model.defer="tags" type="text" class="form-control" id="body" placeholder="تگ ها را وارد کنید (برای جدا کردن تگ ها از کاما استفاده نمایید.)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" wire:model.defer="is_popular">
                                                    <label class="form-check-label">نمایش در لیست محبوب ترین ها</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" wire:model.defer="is_news">
                                                    <label class="form-check-label">نمایش در لیست اخبار</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" wire:model.defer="is_editor_selected">
                                                    <label class="form-check-label">نمایش در منتخب سردبیر</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="top_order" class="control-label">نمایش در برترین های هدر (اعداد یک تا چهار را جهت اولویت بندی وارد نمایید. جهت عدم نمایش در هدر عدد صفر را وارد کنید)</label>
                                                <div wire:ignore>
                                                    <input wire:model.defer="top_order" type="text" class="form-control" id="top_order" placeholder="عدد بین صفر تا چهار وارد نمایید.">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>انتخاب دسته بندی</label>
                                                <div wire:ignore>
                                                    <select id="categories-dropdown" class="form-control" multiple="multiple">
                                                        @foreach($categories as $category)
                                                            <option @if(in_array($category->id, $old_category_ids)) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

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
            tinymce.init({
                selector: '#body',
                language: 'fa_IR',
                valid_elements : '*[*]',
                directionality: 'rtl',
                allow_script_urls: true,
                image_uploadtab: true,
                automatic_uploads: true,
                images_upload_url: '/upload-image',
                relative_urls: false,
                remove_script_host: false,
                document_base_url: '{{ config('app.url') }}',
                theme: 'modern',
                plugins:'image code paste print searchreplace autolink directionality  visualblocks visualchars fullscreen link template ' +
                    'codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  ' +
                    '    contextmenu colorpicker textpattern help',
                toolbar1:'image paste formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
                min_height: 200,
                setup : function(editor)
                {
                    editor.on('init change', function () {
                        editor.save();
                    });
                    editor.on('change', function (e) {
                        @this.set('body', editor.getContent());
                    });
                }

            });

            $('#categories-dropdown').select2({
                theme: "classic"
            });
            $('#categories-dropdown').on('change', function (e) {
                let data = $(this).val();
                @this.set('category_ids', data);
            });
        </script>
    @endpush
</div>


