<section id="glshaPrdctSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach(\App\Models\ReadMoreSection::all() ?? [] as $key => $group)
                    @if($key % 2 == 0)
                        <div class="glshaPrdctBox  glshaPrdctRght">
                            <div class="glshaPrdctInfo">
                                <small>{{ $group->title }}</small>
                                {!! $group->description !!}
                                <a href="{{ $group->href }}">
                                    <i>بیشتر بدانید</i>
                                    <span class="material-icons-outlined">arrow_back</span>
                                </a>
                            </div>
                            <div class="glshaPrdctImg">
                                <img src="{{ $group->image_path }}" alt="img">
                            </div>
                        </div>
                    @else
                        <div class="glshaPrdctBox glshaPrdctLft">
                            <div class="glshaPrdctImg">
                                <img src="{{ $group->image_path }}" alt="img">
                            </div>
                            <div class="glshaPrdctInfo">
                                <small>{{ $group->title }}</small>
                                {!! $group->description !!}
                                <a href="{{ $group->href }}">
                                    <i>بیشتر بدانید</i>
                                    <span class="material-icons-outlined">arrow_back</span>
                                </a>
                            </div>
                        </div>

                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
