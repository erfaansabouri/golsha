<div class="navRow">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navRowDiv">
                    <span class="material-icons clsMnuLink">close</span>
                    <a href="{{ route('home') }}" class="navRowLogo"><img src="{{ asset('assets/front/img/logo1.png') }}" alt="img"></a>
                        <form  class="minMnuSrch" action="{{ route('products.index') }}" method="get">
                            @csrf
                            @method('get')
                            <button><span class="icon-search_black_24dp"></span></button>
                            <input name="search" type="text" placeholder="جستجو در گلشا">
                        </form>
                    <ul class="navRowUl">
                        <li class="navRowLi">
                            <a href="{{ route('home') }}">
                                <i>صفحه اصلی</i>
                            </a>
                        </li>
                        @include('front-pages.partials.mega_menu')
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
