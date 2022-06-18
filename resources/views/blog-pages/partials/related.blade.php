<section id="SlctdEditrSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="SlctdEditrBx">
                    <div class="slctdEditrHdr">
                        <h4>مقالاب مرتبط</h4>
                        <span></span>
                    </div>
                    <div class="slctdEditrBdy">
                        @foreach(\App\Models\BlogPost::similars()->get() ?? [] as $relatedBlogPost)
                            <a href="{{ route('blog.show', $relatedBlogPost->id) }}" class="slctdEditrCrd">
                                <div class="slctedCrdImg">
                                    <div class="image_parent">
                                        <div class="image_inner">
                                            <img src="{{ $relatedBlogPost->image_path }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="slctedCrdInfo">
                                    <p>{{ $relatedBlogPost->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
