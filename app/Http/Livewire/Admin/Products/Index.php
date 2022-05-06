<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'محصولات',
    ];

    public $search = '';
    public function render()
    {
        $products = Product::query();
        if(!empty($this->search))
        {
            $products = $products->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $products = $products->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.products.index', [
            'products' => $products,
        ])->with('pageInfo', $this->pageInfo);
    }
}
