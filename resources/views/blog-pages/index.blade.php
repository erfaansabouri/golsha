@extends('blog')
@section('content')
    @php \Carbon\Carbon::setLocale('fa') @endphp
    <section id="blgArticleSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blgArticleBx">
                        @php $blogPostTopI = \App\Models\BlogPost::query()->topI()->first(); @endphp
                        @if($blogPostTopI)
                            <div class="blgArtclRight">
                                <a href="{{ route('blog.show', @$blogPostTopI->id) }}" class="artclRightBx">
                                    <img src="{{ @$blogPostTopI->image_path }}" alt="img">
                                    <div>
                                        <p>
                                            {{ @$blogPostTopI->title }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <div class="blgArtclLeft">
                            @php $blogPostTopII = \App\Models\BlogPost::query()->topII()->first(); @endphp
                            @if($blogPostTopII)
                                <div class="blgArtclTop">
                                    <a href="{{ route('blog.show', @$blogPostTopII->id) }}" class="artcleTopBx">
                                        <img src="{{ @$blogPostTopII->image_path }}" alt="img">
                                        <div>
                                            <p>
                                                {{ @$blogPostTopII->title }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            <div class="blgArtclBtm">
                                @php $blogPostTopIII = \App\Models\BlogPost::query()->topIII()->first(); @endphp
                                @if($blogPostTopIII)
                                <a href="{{ route('blog.show', @$blogPostTopIII->id) }}" class="artclBotomBx">
                                    <img src="{{ @$blogPostTopIII->image_path }}" alt="img">
                                    <div>
                                        <p>
                                            {{ @$blogPostTopIII->title }}
                                        </p>
                                    </div>
                                </a>
                                @endif

                                @php $blogPostTopIV= \App\Models\BlogPost::query()->topIV()->first(); @endphp
                                @if($blogPostTopIV)
                                <a href="{{ route('blog.show', @$blogPostTopIV->id) }}" class="artclBotomBx">
                                    <img src="{{ @$blogPostTopIV->image_path }}" alt="img">
                                    <div>
                                        <p>
                                            {{ @$blogPostTopIV->title }}
                                        </p>
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="SlctdEditrSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="SlctdEditrBx">
                        <div class="slctdEditrHdr">
                            <h4>منتخب سردبیر</h4>
                            <span></span>
                        </div>
                        <div class="slctdEditrBdy">
                            @foreach(\App\Models\BlogPost::query()->selectedEditor()->get() ?? [] as $blogPost)
                                <a href="{{ route('blog.show', $blogPost->id) }}" class="slctdEditrCrd">
                                    <div class="slctedCrdImg">
                                        <div class="image_parent">
                                            <div class="image_inner">
                                                <img src="{{ $blogPost->image_path }}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slctedCrdInfo">
                                        <p>{{ $blogPost->title }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blogPostSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blogPostsBox">
                        <div class="blogPstsRght">
                            <div class="advRowBxRght">
                                <a href="{{ (new \App\Models\Setting())->getHrefByKey('blog-1') }}">
                                    <img src="{{ (new \App\Models\Setting())->findByKey('blog-1') }}" alt="img">
                                </a>
                            </div>
                            <div class="blgLastPost">
                                <h5>آخرین  <span>مقالات</span> گلشا</h5>
                                <ul>
                                    @foreach($blogPosts as $blogPost)
                                        <li class="blglstPostLi">
                                            <div class="blgPostImg">
                                                <div class="image_parent">
                                                    <div class="image_inner">
                                                        <img src="{{ $blogPost->image_path }}" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blgPostInfo">
                                                <h6>{{ $blogPost->title }}</h6>
                                                <p>{{ substr(strip_tags($blogPost->body), 0, 100) }}</p>
                                                <div class="blgPstInfoBtm">
                                                    <div class="blgPstBtmRght">
                                                        <div>
                                                            <span class="icon-account_circle_black_24dp"></span>
                                                            <i>{{ $blogPost->admin->full_name }}</i>
                                                        </div>
                                                        <div>
                                                            <span class="icon-calendar_month_black_24dp"></span>
                                                            <i>{{ $blogPost->created_at->diffForHumans() }}</i>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('blog.show', $blogPost->id) }}">مطالعه مطلب</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="d-flex justify-content-center">
                                    {!! $blogPosts->links() !!}
                                </div>
                            </div>
                        </div>
                        <div class="blogAdvSide">
                            <div class="advRowBxLft">
                                <a href="{{ (new \App\Models\Setting())->findByKey('blog-4') }}">
                                    <span class="icon-telegram-alt"></span>
                                    <i>در تلگرام گلشا را دنبال کنید</i>
                                </a>
                                <a href="{{ (new \App\Models\Setting())->findByKey('blog-5') }}">
                                    <span class="icon-bxl-instagram"></span>
                                    <i>در اینستاگرام گلشا را دنبال کنید</i>
                                </a>
                            </div>
                            <a href="{{ (new \App\Models\Setting())->getHrefByKey('blog-2') }}" class="blgAdvSidBx">
                                <img src="{{ (new \App\Models\Setting())->findByKey('blog-2') }}" alt="img">
                            </a>
                            <a href="{{ (new \App\Models\Setting())->getHrefByKey('blog-3') }}" class="blgAdvSidBx">
                                <img src="{{ (new \App\Models\Setting())->findByKey('blog-3') }}" alt="img">
                            </a>
                            @include('blog-pages.partials.populars')
                            @include('blog-pages.partials.news')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
