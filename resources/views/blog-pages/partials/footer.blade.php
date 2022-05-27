<section id="blogFooter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blogFtrBox">
                    <div class="blogFtrLinks">
                        <ul>
                            <p>محصولات</p>
                            @foreach(\App\Models\Category::query()->take(4)->get() ?? [] as $category)
                                <li><a href="#">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                        <ul>
                            <p>گلشا</p>
                            <li><a href="#">محصولات گلشا</a></li>
                            <li><a href="{{ route('about-us.index') }}">درباره گلشا</a></li>
                            <li><a href="{{ route('contact-us.index') }}">تماس با گلشا</a></li>
                            <li><a href="{{ route('blog.index') }}">اخبار گلشا</a></li>
                        </ul>
                    </div>
                    <div class="blogFtrTags">
                        @foreach($tags as $tag)
                            <a href="#">{{ $tag }}</a>
                        @endforeach
                    </div>
                    <div class="blogFtrAbout">
                        <p>
                            <span>گلشا مگ: </span>
                            {{ $footerDescription }}
                        </p>
                    </div>
                </div>
                <div class="blgFtrCpyRght">
                    <span>صاحب امتیاز حقوق تمامی وبلاگ  </span>
                    <a href="#">گلشا</a>
                    <span> می باشد. بازنشر محتوا صرفا با ذکر منبع مجاز است</span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="hdrSubMnuBox"></div>