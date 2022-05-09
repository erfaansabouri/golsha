<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class Create extends Component
{
    public $code;
    public $discountPercentage;
    public $discountToman;

    public function render()
    {
        return view('livewire.admin.coupons.create');
    }

    public function store()
    {
        Coupon::query()
            ->create([
                'code' => $this->code,
                'discount_percentage' => $this->discountPercentage,
                'discount_toman' => $this->discountToman,
            ]);

        session()->flash('message', 'کوپون با موفقیت ایجاد شد.');
        redirect()->route('admin.coupons.index');
    }
}
