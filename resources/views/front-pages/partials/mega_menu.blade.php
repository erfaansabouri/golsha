<li class="navRowLi havSubMnuLink">
    <a href="#" class="remveLink">
        <span class="material-icons-outlined remvLnkSpan">menu</span>
        <i>محصولات</i>
    </a>
    <div class="navRowSubBx">
        <ul class="navRowSubUl">
            @foreach(\App\Models\Category::all() ?? [] as $category)
                <li class="navRowSubLi">
                    <a href="#" class="navRowSubLnk">
                        <i>{{ $category->title }}</i>
                        <span class="material-icons opnSubSub">keyboard_arrow_left</span>
                    </a>
                    <div class="navSubBox">
                        <div>
                            <ul>
                                <li>
                                    <a href="{{ route('products.index', ['category_id' => $category->id]) }}" class="allPrdctLnk">
                                        <i>همه محصولات دسته</i>
                                        <span class="material-icons">keyboard_arrow_left</span>
                                    </a>
                                </li>
                                @foreach($category->products()->get()->take(14) ?? [] as $cProduct)
                                    <li><a href="{{ route('products.show', $cProduct->id) }}">{{ $cProduct->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</li>
