<div class="rltdPrdctHed">
    <h5>مطالب مرتبط</h5>
    <span></span>
</div>
<div class="rltdPrdctBdy">
    <ul class="rltdPrdctLst">
        @foreach(\App\Models\BlogPost::query()->inRandomOrder()->take(4)->get() as $blogPost)
            <li>
                <a href="{{ route('blog.show', $blogPost->id) }}">
                    <div class="rltdPrdctImg">
                        <div class="image_parent">
                            <div class="image_inner">
                                <img src="{{ $blogPost->image_path }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="rltdPrdctTxt">
                        {{ $blogPost->title }}
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
