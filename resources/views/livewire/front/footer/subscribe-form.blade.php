<div>
    <div class="ftrnewsBox">
        <p>عضویت در خبر نامه گلشا</p>
        <p>{{ $result }}</p>
        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
        <div class="ftrnewsReg">
            <input wire:model.defer="email" type="email" placeholder="ایمیل خود را وارد کنید">
            <button wire:click.prevent="do" type="button">ثبت</button>
        </div>
    </div>
</div>
