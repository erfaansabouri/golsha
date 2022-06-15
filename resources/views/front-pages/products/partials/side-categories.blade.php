<div class="prdctIntrnlSide">
    <div class="buyOffrList">
        <p>دسته بندی:</p>
        <ul>
            <li>
                @foreach(\App\Models\Category::all() as $category)
                    <a href="{{ route('products.index', ['category_id' => $category->id]) }}">{{ $category->title }}</a>
                @endforeach
            </li>
        </ul>
    </div>
    @foreach(\App\Models\Product::query()->where('show_in_right_bar', 1)->get() as $showInRightBarProduct)
        <a href="{{ route('products.show', $showInRightBarProduct->id) }}" class="buyOfferBox">
            <div class="buyOffrImg">
                <img src="{{ $showInRightBarProduct->first_image_path }}" alt="img">
            </div>
            <div class="buyOffrBdy">
                <h6>{{ $showInRightBarProduct->title }}</h6>
                <div class="buyOffrPrc">
                    <div>
                        @if($showInRightBarProduct->hasActiveDiscount())
                            <small>{{ $showInRightBarProduct->discount_percentage }}%</small>
                            <del>{{ number_format($showInRightBarProduct->price) }} تومان</del>
                        @endif

                    </div>
                    <p>{{ number_format($showInRightBarProduct->purchase_price) }} تومان</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
