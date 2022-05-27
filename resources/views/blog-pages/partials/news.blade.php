<div class="blgSidPoplar">
    <h5>اخبار گلشا</h5>
    <ul>
        @foreach(\App\Models\BlogPost::query()->news()->get() ?? [] as $blogPost)
            <li>
                <a href="{{ route('blog.show', $blogPost->id) }}">
                    <div class="blgPoplarImg">
                        <img src="{{ $blogPost->image_path }}" alt="img">
                    </div>
                    <div class="blgPoplarInfo">
                        <h6>{{ $blogPost->title }}</h6>
                        <p>
                            <span class="icon-calendar_month_black_24dp"></span>
                            <i>{{ $blogPost->created_at->diffForHumans() }}</i>
                        </p>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>