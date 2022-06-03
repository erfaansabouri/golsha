@extends('app')
@section('content')

    <section id="ordersSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="orderSecBox">
                        @include('front-pages.profile.profile-right-bar')
                        <div class="ordrsMain">
                            <div class="commntsSecBx">
                                <h5 class="commntSecTtl">نظر های من</h5>
                                <ul>
                                    @foreach($comments as $comment)
                                        <li class="commntBox">
                                            <div class="commntBxBdy">
                                                <div class="cmntBdyTitl">
                                                    <h6>{{ $comment->title }}</h6>
                                                    <span>({{ $comment->user->full_name }})</span>
                                                </div>
                                                <div class="cmntBdyText">
                                                    {{ $comment->body }}
                                                </div>
                                                @if($comment->answer)
                                                <div class="cmntBdyRply">
                                                    <span>پاسخ گلشا:</span>
                                                    <p>{{ $comment->answer->body }}</p>
                                                </div>
                                                @endif
                                            </div>
                                            @php
                                                $product = \App\Models\Product::query()->findOrFail($comment->commentable_id);
                                            @endphp
                                            <a href="#" class="commntBxImg">
                                                <img src="{{ $product->firstImage() ? $product->firstImage()->path : '' }}" alt="img">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
