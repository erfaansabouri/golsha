<div class="navRow">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navRowDiv">
                    <span class="material-icons clsMnuLink">close</span>
                    <a href="#" class="navRowLogo"><img src="img/logo1.png" alt="img"></a>
                    <div class="minMnuSrch">
                        <button><span class="icon-search_black_24dp"></span></button>
                        <input type="text" placeholder="جستجو در گلشا">
                    </div>
                    <ul class="navRowUl">
                        <li class="navRowLi">
                            <a href="{{ route('home') }}">
                                <i>صفحه اصلی</i>
                            </a>
                        </li>
                        <li class="navRowLi havSubMnuLink">
                            <a href="#" class="remveLink">
                                <span class="material-icons-outlined remvLnkSpan">menu</span>
                                <i>محصولات</i>
                            </a>
                            <div class="navRowSubBx">
                                <ul class="navRowSubUl">
                                    @foreach(\App\Models\Category::all() ?? [] as $category)
                                        <li class="navRowSubLi">
                                            <a href="#" class="navRowSubLnk">
                                                <i>{{ $category->title }}</i>
                                                <span class="material-icons opnSubSub">keyboard_arrow_left</span>
                                            </a>
                                            <div class="navSubBox">
                                                <div>
                                                    @php
                                                        $productGroups = $category->products()->take(45)->get()->splitIn(3);
                                                    @endphp
                                                    @foreach($productGroups as $productGroup)
                                                        <ul>
                                                            @foreach($productGroup as $product)
                                                                <li><a href="#">{{ $product->title }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endforeach
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="allPrdctLnk">
                                                                <i>همه محصولات دسته</i>
                                                                <span class="material-icons">keyboard_arrow_left</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                        <li class="navRowLi">
                            <a href="{{ route('blog.index') }}">
                                <i>مجله گلشا</i>
                            </a>
                        </li>
                        <li class="navRowLi">
                            <a href="{{ route('work-with-us.index') }}">
                                <i>همکاری با ما</i>
                            </a>
                        </li>
                        <li class="navRowLi">
                            <a href="{{ route('dissatisfaction.index') }}">
                                <i>ثبت نارضایتی</i>
                            </a>
                        </li>
                        <li class="navRowLi">
                            <a href="{{ route('support.index') }}">
                                <i>پشتیبانی</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
