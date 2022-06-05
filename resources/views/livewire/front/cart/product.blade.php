<tr>
    <td>
        <div class="cartPrdctItm">
            <div class="cartPrdctImg">
                <img src="{{ $cartProduct->productInfo->first_image_path }}" alt="img">
            </div>
            <div class="cartPrdctInfo">
                <h3>{{ $cartProduct->productInfo->title }}</h3>
                <ul>
                    <li>
                        <span class="icon-storefront_black_24dp"></span>
                        <i>فروشنده: {{ $cartProduct->productInfo->seller_name }}</i>
                    </li>
                    <li>
                        <span class="icon-barcode-fill"></span>
                        <i>کد محصول: {{ $cartProduct->productInfo->id }}</i>
                    </li>
                    <li>
                        <span class="icon-aspect_ratio_black_24dp"></span>
                        <i>حجم محصول: {{ $cartProduct->productInfo->size }}</i>
                    </li>
                </ul>
            </div>
        </div>
    </td>
    <td>
        <div class="cartPriceBox">
            @if($cartProduct->isPurchasedWithDiscount())
                <small>{{ $cartProduct->discountPercentage() }}%</small>
            @endif
            <div>
                <p>{{ number_format($cartProduct->product_purchase_price) }} تومان</p>
                @if($cartProduct->isPurchasedWithDiscount())
                    <del>{{ number_format($cartProduct->product_original_price) }} تومان</del>
                @endif
            </div>
        </div>
    </td>
    <td>
        <div class="mountCartBx">
            <div class="input-group">
                <div class="term_time_box">
                    <span wire:ignore wire:click="increaseCartProductCount({{ $cartProduct->id }})" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></span>
                    <input class="quantity" min="0" name="quantity" value="{{ $count }}" type="number" id="num03">
                    <span wire:ignore wire:click="decreaseCartProductCount({{ $cartProduct->id }})" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus" ></span>
                </div>
            </div>
            <p class="deletCart" wire:click="deleteCartProduct({{ $cartProduct->id }})">
                <span class="icon-trashcan1"></span>
                <i>حذف</i>
            </p>
        </div>
    </td>
    <td class="finalPrice">{{ number_format($totalPrice) }} تومان</td>
</tr>
