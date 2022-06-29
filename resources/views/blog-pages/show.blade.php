@extends('blog')
@section('content')
    @php \Carbon\Carbon::setLocale('fa') @endphp



    <section id="blgTopSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blgTopBox">
                        <div class="blgTopBxRght"></div>
                        <div class="blgTopBxLeft">
                            <div class="blgTpLeftTop"></div>
                            <div class="blgTpLeftBtm"></div>
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
                            <div class="blgAdvRowBx">
                                <div class="blgAdvRowBx">
                                    <a href="#">
                                        <img src="{{ $ads[0]->image_path }}" alt="img">
                                    </a>
                                </div>
                            </div>
                            <div class="blgLastPost">
                                <div class="blgSnglPost">
                                    <h2>{{ $blogPost->title }}</h2>
                                    <div class="blgSnglPstImg">
                                        <div class="image_parent">
                                            <div class="image_inner">
                                                <img src="{{ $blogPost->image_path }}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blgSnglTimInfo">
                                        <div class="blgSnglRghtInf">
                                            <div>
                                                <span class="icon-account_circle_black_24dp"></span>
                                                <i>{{ $blogPost->admin->full_name }}</i>
                                            </div>
                                            <div>
                                                <span class="icon-calendar_month_black_24dp"></span>
                                                <i>{{ $blogPost->created_at->diffForHumans() }}</i>
                                            </div>
                                        </div>
                                        <div class="blgSnglLftInf">
                                            <span class="icon-watch_later_black_24dp"></span>
                                            <i>زمان مورد نیاز برای مطالعه: ۲ دقیقه</i>
                                        </div>
                                    </div>
                                    <div class="blgSnglPstTxt" style="font-size: 16px; margin: 0">
                                        {!! nl2br($blogPost->body) !!}
                                    </div>
                                    <div class="blgSnglTags">
                                        <div class="blgSnglTgHed">
                                            <h6>
                                                <span class="icon-local_offer_black_24dp"></span>
                                                <i>برچسب ها</i>
                                            </h6>
                                            <small></small>
                                        </div>
                                        <div class="blgSnglTgBdy">
                                            @php
                                                $blogPostTags = $blogPost->tagsArray;
                                            @endphp
                                            @foreach($blogPostTags as $tag)
                                                <a href="{{ route('blog.index', ['tag' => $tag]) }}">{{ $tag }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blogAdvSide">
                            <a href="#" class="blgAdvSidBx">
                                <img src="{{ $ads[1]->image_path }}" alt="img">
                            </a>
                            <a href="#" class="blgAdvSidBx">
                                <img src="{{ $ads[2]->image_path }}" alt="img">
                            </a>
                            <div class="blogStioalLnk">
                                <a href="#">
                                    <span class="icon-telegram-alt"></span>
                                    <i>در تلگرام گلشا را دنبال کنید</i>
                                </a>
                                <a href="#">
                                    <span class="icon-bxl-instagram"></span>
                                    <i>در اینستاگرام گلشا را دنبال کنید</i>
                                </a>
                            </div>
                            @include('blog-pages.partials.populars')
                            @include('blog-pages.partials.news')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('blog-pages.partials.related')
@endsection
