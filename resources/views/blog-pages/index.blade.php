@extends('blog')
@section('content')
    @php \Carbon\Carbon::setLocale('fa') @endphp
    <section id="blgArticleSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blgArticleBx">
                        <div class="blgArtclRight">
                            @php $blogPostTopI = \App\Models\BlogPost::query()->topI()->first(); @endphp
                            <a href="{{ route('blog.show', $blogPostTopI->id) }}" class="artclRightBx">
                                <img src="{{ $blogPostTopI->image_path }}" alt="img">
                                <div>
                                    <p>
                                        {{ $blogPostTopI->title }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="blgArtclLeft">
                            <div class="blgArtclTop">
                                @php $blogPostTopII = \App\Models\BlogPost::query()->topII()->first(); @endphp
                                <a href="{{ route('blog.show', $blogPostTopII->id) }}" class="artcleTopBx">
                                    <img src="{{ $blogPostTopII->image_path }}" alt="img">
                                    <div>
                                        <p>
                                            {{ $blogPostTopII->title }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="blgArtclBtm">
                                @php $blogPostTopIII = \App\Models\BlogPost::query()->topIII()->first(); @endphp
                                <a href="{{ route('blog.show', $blogPostTopIII->id) }}" class="artclBotomBx">
                                    <img src="{{ $blogPostTopIII->image_path }}" alt="img">
                                    <div>
                                        <p>
                                            {{ $blogPostTopIII->title }}
                                        </p>
                                    </div>
                                </a>
                                @php $blogPostTopIV= \App\Models\BlogPost::query()->topIV()->first(); @endphp

                                <a href="{{ route('blog.show', $blogPostTopIV->id) }}" class="artclBotomBx">
                                    <img src="{{ $blogPostTopIV->image_path }}" alt="img">
                                    <div>
                                        <p>
                                            {{ $blogPostTopIV->title }}
                                        </p>
                                    </div>
                                </a>
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
                                <a href="#">
                                    <img src="{{ $ads[0]->image_path }}" alt="img">
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
                                                <p>{{ $blogPost->body }}</p>
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
                                <a href="#">
                                    <span class="icon-telegram-alt"></span>
                                    <i>در تلگرام گلشا را دنبال کنید</i>
                                </a>
                                <a href="#">
                                    <span class="icon-bxl-instagram"></span>
                                    <i>در اینستاگرام گلشا را دنبال کنید</i>
                                </a>
                            </div>
                            <a href="#" class="blgAdvSidBx">
                                <img src="{{ $ads[1]->image_path }}" alt="img">
                            </a>
                            <a href="#" class="blgAdvSidBx">
                                <img src="{{ $ads[2]->image_path }}" alt="img">
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
