<div>
    @foreach($addresses as $address)
        <div class="DestntnAddrss" wire:key="{{ $loop->index }}">
            <div class="DestAddrsTtl">
                <span class="icon-location_on_black_24dp"></span>
                <i>آدرس مقصد</i>
            </div>
            <div class="DestAddrssBx">
                <div>
                    <h6>{{ $address->receiver_name }}</h6>
                    <p>آدرس: {{ $address->full }}</p>
                </div>
                <div>
                    <button wire:click="destroy({{ $address->id }})" class="btn btn-danger">حذف آدرس</button>
                    @if($address->id == $chosen_id)
                        <button wire:click="choose({{ $cart->id }}, {{ $address->id }})" class="btn btn-outline-success">انتخاب شده</button>
                    @else
                        <button wire:click="choose({{ $cart->id }}, {{ $address->id }})" class="btn btn-success">انتخاب آدرس</button>
                    @endif
                </div>


            </div>
        </div>
    @endforeach
</div>
