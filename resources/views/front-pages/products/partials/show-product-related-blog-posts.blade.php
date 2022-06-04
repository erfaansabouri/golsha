<div class="prdctRltdDuc">
    <div class="prdctdDucHdr">
        <h4>مطالب مرتبط</h4>
        <span></span>
    </div>
    <div class="prdctdDucBdy">
        @foreach(\App\Models\BlogPost::query()->inRandomOrder()->take(4)->get() as $similarBlogPost)
            <a href="{{ route('blog.show', $similarBlogPost->id) }}" class="prdctdDucCrd">
                <div class="prdctdDucImg">
                    <div class="image_parent">
                        <div class="image_inner">
                            <img src="{{ $similarBlogPost->image_path }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="prdctdDucInfo">
                    <p>{{ $similarBlogPost->title }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
