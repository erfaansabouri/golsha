<div class="topRow">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="topRowBx">
                    <a href="{{ route('home') }}" class="hdrLogo"><img src="{{ asset('assets/front/img/logo1.png') }}" alt="img"></a>
                    <div class="hdrSrchBox">
                        <div class="srchDropDn">
                            <form action="{{ route('products.index') }}" method="get">
                                @csrf
                                @method('get')
                                <div class="srchDropSel">
                                    <input name="search" type="text" class="form-control srchDropInpt"  placeholder="جستجو در گلشا">
                                </div>
                                <ul class="srchDropList">
                                    <p>بیشترین جستجوها</p>
                                    <li class="srchDropItem"><a href="#">Item 1</a></li>
                                    <li class="srchDropItem"><a href="#">Item 2</a></li>
                                    <li class="srchDropItem"><a href="#">Item 3</a></li>
                                </ul>
                            </form>
                        </div>
                        <button class="hdrSrchBtn"><span class="icon-search_black_24dp"></span></button>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="hdrLginBox">
                        <!-- <a href="#" class="hdrLginLink">ورود / عضویت</a>  login Link -->
                        <div class="accLinkBox">
                            <span class="icon-person_outline_black_24dp opnUserMnu"></span>
                            <div class="userMnuBox">
                                <p>{{ @$user->full_name }}</p>
                                <ul>
                                    <li>
                                        <a href="{{ route('user.profile.details') }}">
                                            <span class="icon-address-book-o"></span>
                                            <i>اطلاعات و آدرس ها</i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-inventory_2_black_24dp-1"></span>
                                            <i>سفارش ها</i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile.saved-products') }}">
                                            <span class="icon-bookmark_border_black_24dp"></span>
                                            <i>ذخیره شده ها</i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile.comments') }}">
                                            <span class="icon-chat_bubble_outline_black_24dp"></span>
                                            <i>دیدگاه و پاسخ ها</i>
                                        </a>
                                    </li>
                                </ul>
                                <a href="{{ route('user.auth.logout') }}">
                                    <button>
                                        خروج از حساب
                                    </button>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="hdrShopLink">
                            <span class="icon-shopping_bag_black_24dp"></span>
                        </a>
                        <a href="#" class="opnMnuLink"><span class="material-icons">menu</span></a>
                    </div>
                    @else
                        <div class="hdrLginBox">
                            <a href="{{ route('user.auth.login.form') }}" class="hdrLginLink">ورود / عضویت</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
