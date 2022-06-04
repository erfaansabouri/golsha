@php

    $items = \App\Models\Setting::query()
                ->where('category', \App\Models\Setting::CATEGORIES['product-banner'])
                ->get();

@endphp
<div class="intrnlbannrBx">
    <div class="intrnlbannrTop">
        <a href="{{ $items[0]->href }}">
            <img src="{{ $items[0]->image_path }}" alt="img">
        </a>
    </div>
    <div class="intrnlbannrBtm">
        <div><a href="{{ $items[1]->href }}"><img src="{{ $items[1]->image_path }}" alt="img"></a></div>
        <div><a href="{{ $items[2]->href }}"><img src="{{ $items[2]->image_path }}" alt="img"></a></div>
        <div><a href={{ $items[3]->href }}""><img src="{{ $items[3]->image_path }}" alt="img"></a></div>
    </div>
</div>
