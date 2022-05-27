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
                        @foreach($blogPost->relatedBlogPosts()->get() ?? [] as $relatedBlogPost)
                            <a href="#" class="slctdEditrCrd">
                                <div class="slctedCrdImg">
                                    <div class="image_parent">
                                        <div class="image_inner">
                                            <img src="img/img22.jpg" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="slctedCrdInfo">
                                    <p>تاثیرگذار ترین راه کارهای مدیریت زمان</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>