<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'کوپون ها',
    ];

    public $search = '';
    public function render()
    {
        $coupons = Coupon::query();
        if(!empty($this->search))
        {
            $coupons = $coupons->where('code', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $coupons = $coupons->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.coupons.index', [
            'coupons' => $coupons,
        ])->with('pageInfo', $this->pageInfo);
    }
}
