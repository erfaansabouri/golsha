<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use App\Models\Group;
use Livewire\Component;

class Edit extends Component
{
    public $record;
    public $code;
    public $discountPercentage;
    public $discountToman;

    public function mount($record)
    {
        $this->record = $record;
        $this->code = $record->code;
        $this->discountPercentage = $record->discount_percentage;
        $this->discountToman = $record->discount_toman;
    }

    public function render()
    {
        return view('livewire.admin.coupons.edit');
    }

    public function update($id)
    {
        Coupon::query()
            ->findOrFail($id)
            ->update([
                'code' => $this->code,
                'discount_percentage' => $this->discountPercentage,
            ]);

        session()->flash('message', 'کوپون با موفقیت ویرایش شد.');
        redirect()->route('admin.coupons.index');
    }
}
