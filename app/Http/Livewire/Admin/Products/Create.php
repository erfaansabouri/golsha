<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Group;
use App\Models\GroupProduct;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductFaq;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\Request;

class Create extends Component
{
    protected $pageInfo = [
        'title' => 'تعریف محصول جدید',
    ];
    /* Form inputs */
    public $title;
    public $sellerName;
    public $ingredients;
    public $size;
    public $virtues;
    public $introduction;
    public $price = 0;
    public $discountPercentage;
    public $discountStartedAt;
    public $discountEndedAt;
    public $discountUnixStartedAt;
    public $discountUnixEndedAt;

    public $productAttributeInputs = [];
    public $productAttributeCounter = 0;
    public $attributeKey;
    public $attributeValue;


    public $productFaqInputs = [];
    public $productFaqCounter = 0;
    public $faqQuestion;
    public $faqAnswer;

    public $purchasePrice = 0;

    public $categories;
    public $category_ids = [];

    public $groups;
    public $group_ids = [];

    public function mount()
    {
         $this->categories = Category::all();
         $this->groups = Group::all();
    }

    public function appendProductAttribute($i)
    {
        $productAttributeCounter = $i + 1;
        $this->productAttributeCounter = $productAttributeCounter;
        $this->productAttributeInputs[$productAttributeCounter] = $productAttributeCounter;
    }

    public function removeProductAttribute($i)
    {
        unset($this->productAttributeInputs[$i]);
    }

    public function appendProductFaq($i)
    {
        $productFaqCounter = $i + 1;
        $this->productFaqCounter = $productFaqCounter;
        $this->productFaqInputs[$productFaqCounter] = $productFaqCounter;
    }

    public function removeProductFaq($i)
    {
        unset($this->productFaqInputs[$i]);
    }


    public function render()
    {
        return view('livewire.admin.products.create')->with('pageInfo', $this->pageInfo);
    }

    public function store()
    {
        $product = Product::query()
            ->create([
                'title' => $this->title,
                'seller_name' => $this->sellerName,
                'ingredients' => $this->ingredients,
                'size' => $this->size,
                'virtues' => $this->virtues,
                'introduction' => $this->introduction,
                'price' => $this->price,
                'discount_percentage' => $this->discountPercentage,
            ]);

        foreach ($this->productAttributeInputs as $key => $value) {
            if(!empty(@$this->attributeKey[$key]))
            {
                ProductAttribute::query()
                    ->create([
                        'product_id' => $product->id,
                        'key' => $this->attributeKey[$key],
                        'value' => $this->attributeValue[$key]
                    ]);
            }
        }

        foreach ($this->productFaqInputs as $key => $value) {
            if(!empty(@$this->faqQuestion[$key]))
            {
                ProductFaq::query()
                    ->create([
                        'product_id' => $product->id,
                        'question' => $this->faqQuestion[$key],
                        'answer' => $this->faqAnswer[$key]
                    ]);
            }

        }

        foreach ($this->category_ids as $category_id)
        {
            CategoryProduct::query()
                ->create([
                    'product_id' => $product->id,
                    'category_id' => $category_id
                ]);
        }


        foreach ($this->group_ids as $group_id)
        {
            GroupProduct::query()
                ->create([
                    'product_id' => $product->id,
                    'group_id' => $group_id
                ]);
        }
        session()->flash('message', 'محصول با موفقیت ایجاد شد.');
        redirect()->route('admin.products.index');
    }

    public function updatePurchasePrice()
    {
        if(!empty($this->discountPercentage))
            $this->purchasePrice = ((100 - $this->discountPercentage) * $this->price) / 100;
        else
            $this->purchasePrice = $this->price;
    }
}
