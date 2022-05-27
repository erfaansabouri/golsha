
<section id="blogHeader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blgHdrBox">
                    <a href="#" class="blgHdrLogo">
                        <img src="{{ asset('assets/front/img/logo4.png') }}" alt="logo">
                    </a>
                    <div class="blgHdrMenu">
                        <span class="material-icons-outlined clsMinMnu">disabled_by_default</span>
                        <a href="#" class="blgHdrMenuLgo">
                            <img src="{{ asset('assets/front/img/logo4.png') }}" alt="logo">
                        </a>
                        <ul>
                            @foreach(\App\Models\BlogCategory::all() ?? [] as $blogCategory)
                                <li><a href="{{ route('blog.index', ['category_id' => $blogCategory->id]) }}">{{ $blogCategory->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="strSrchLink">
                        <div class="blgHdrSerch">
                            <span class="icon-search_black_36dp blgHdrSrchLnk"></span>
                            <div class="blgHdrSrchBx">
                                <div class="blgHdrSrchRw">
                                    <button><span class="icon-search_black_36dp"></span></button>
                                    <input type="text" placeholder="جستجو در بین مطالب">
                                </div>
                                <div class="mostSearch">
                                    <p>پرطرفدار</p>
                                    <span>{{ \App\Models\BlogPost::query()->count() }} مطلب</span>
                                </div>
                                <div class="mostSrchTags">
                                    <a href="#">تقویت مو</a>
                                    <a href="#">کرونا</a>
                                    <a href="#">لاغری شکم</a>
                                    <a href="#">تقویت مو</a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="storeLink">فروشگاه گلشا</a>
                        <a href="#" class="opnMinMnu"><span class="material-icons">menu</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>