<div>
    <div class="DestntnAddrss">
        <div class="DestAddrssBx">
            <div>
                <h6>لطفا ابتدا آدرسی را در حساب کاربریتان ایجاد نمایید.</h6>
            </div>
            <button class="btn btn-success btn-sm" type="button"  data-toggle="modal" data-target="#create-address">ثبت آدرس جدید</button>
            <div class="modal" id="create-address">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ثبت آدرس جدید</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="comment">نام گیرنده:</label>
                                    <input type="text" class="form-control" wire:model.defer="receiver_name" placeholder="نام گیرنده را وارد کنید.">
                                </div>
                                <div class="form-group">
                                    <label for="comment">شماره تماس گیرنده:</label>
                                    <input type="text" class="form-control" wire:model.defer="phone_number" placeholder="شماره تماس گیرنده را وارد کنید.">
                                </div>
                                <div class="form-group">
                                    <label for="comment">کشور:</label>
                                    <input type="text" class="form-control" wire:model.defer="country" placeholder="کشور را وارد کنید.">
                                </div>
                                <div class="form-group">
                                    <label for="comment">استان:</label>
                                    <input type="text" class="form-control" wire:model.defer="state" placeholder="استان را وارد کنید.">
                                </div>
                                <div class="form-group">
                                    <label for="comment">شهر:</label>
                                    <input type="text" class="form-control" wire:model.defer="city" placeholder="شهر را وارد کنید.">
                                </div>
                                <div class="form-group">
                                    <label for="comment">آدرس:</label>
                                    <textarea type="text" class="form-control" wire:model.defer="first_line" placeholder="آدرس را وارد کنید."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="comment">توضیحات:</label>
                                    <textarea type="text" class="form-control" wire:model.defer="second_line" placeholder="توضیحات را وارد کنید."></textarea>
                                </div>
                                <button class="btn btn-success btn-sm" type="button" wire:click.prevent="storeAddress">ثبت آدرس</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.livewire.on('addressCreated', () => {
            $('#create-address').modal('hide');
        })
    </script>
@endpush
