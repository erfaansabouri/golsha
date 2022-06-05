<div>
    @if(empty($cart->coupon_id))
    <a href="#" class="discontLink" data-toggle="modal" data-target="#discntModal">
        <span class="icon-local_offer_black_24dp"></span>
        <i>کد تخفیف دارید؟</i>
    </a>
    @else
        <button wire:click.prevent="removeCoupon({{ $cart->id }})" class="btn btn-danger">حذف کد تخفیف</button>
    @endif
    <!-- Modal -->
    <div id="discntModal" class="modal fade" role="dialog" wire:ignore.self>
        <div class="modal-dialog  modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span>{{ $result }}</span>
                    <input wire:model.defer="code" type="text" placeholder="کد تخفیف را وارد کنید">
                </div>
                <div class="modal-footer">
                    <button wire:click.prevent="submitCode({{ $cart->id }})" class="btn btn-default">ثبت کد</button>
                </div>
            </div>

        </div>
    </div>
</div>
