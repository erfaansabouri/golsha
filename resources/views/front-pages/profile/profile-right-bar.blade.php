<div class="ordrsMnu">
    <p>ایمان امیری</p>
    <ul>
        <li>
            <a href="{{ route('user.profile.details') }}" class="@if(Route::is('user.profile.details')) ordrMnuActv @endif">
                <span class="icon-address-book-o"></span>
                <i>اطلاعات و آدرس ها</i>
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile.orders') }}" class="@if(Route::is('user.profile.orders')) ordrMnuActv @endif">
                <span class="icon-inventory_2_black_24dp-1"></span>
                <i>سفارش ها</i>
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile.saved-products') }}" class="@if(Route::is('user.profile.saved-products')) ordrMnuActv @endif">
                <span class="icon-bookmark_border_black_24dp"></span>
                <i>ذخیره شده ها</i>
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile.comments') }}" class="@if(Route::is('user.profile.comments')) ordrMnuActv @endif">
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
