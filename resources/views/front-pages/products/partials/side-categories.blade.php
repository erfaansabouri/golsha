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
</div>
