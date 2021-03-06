<div>
    @if($status == 'go_to_cart')
    <a href="{{ route('user.cart.show' ) }}" class="prductInfBtn">
        <span class="icon-shopping_bag_black_24dp"></span>
        <i>رفتن به سبد خرید</i>
    </a>
    @else
        @if($product->available_soon)
            <button class="btn btn-warning btn-block" style="background-color: #e5920b; cursor: wait;border-radius: 10px; width: 85%; margin: auto; height: 75px">
                <i>
                    <svg style="width: 30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <path d="M435.2,512h25.6v-51.2h-25.6v-25.6c0-63.08-33.68-122.12-87.9-154.1c-9.07-5.38-14.5-14.02-14.5-23.08v-4.05
		c0-9.05,5.43-17.68,14.48-23.03c54.25-32,87.93-91.07,87.93-154.15V51.2h25.6V0h-25.6H76.8H51.2v51.2h25.6v25.6
		c0,63.07,33.65,122.15,87.9,154.15c9.05,5.35,14.5,13.95,14.5,23.03v4.05c0,9.05-5.45,17.7-14.5,23.05
		c-54.25,32-87.9,91.05-87.9,154.12v25.6H51.2V512h25.6H435.2z M384,51.2v25.6c0,28.05-9.33,54.97-25.73,76.8H153.7
		c-16.4-21.83-25.7-48.75-25.7-76.8V51.2H384z M190.7,325.17c24.88-14.7,39.7-39.77,39.7-67.15V256h51.2v2.02
		c0,27.35,14.8,52.45,39.7,67.15c23.33,13.78,41.15,34.6,51.75,58.83H138.93C149.52,359.77,167.38,338.92,190.7,325.17z"/>
</g>
</svg>
                </i>
                <span>به زودی (در حال تولید)</span>

            </button>
        @else
            <a href="{{ route('user.cart.add-product', $product->id ) }}" class="prductInfBtn">
                <span class="icon-shopping_bag_black_24dp"></span>
                <i>افزودن به سبد خرید</i>
            </a>
        @endif

    @endif
</div>
