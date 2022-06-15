<div>
    @if($status == 'go_to_cart')
    <a href="{{ route('user.cart.show' ) }}" class="prductInfBtn">
        <span class="icon-shopping_bag_black_24dp"></span>
        <i>رفتن به سبد خرید</i>
    </a>
    @else
    <a href="{{ route('user.cart.add-product', $product->id ) }}" class="prductInfBtn">
            <span class="icon-shopping_bag_black_24dp"></span>
            <i>افزودن به سبد خرید</i>
    </a>
    @endif
</div>
