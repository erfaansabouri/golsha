<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Group;
use App\Models\GroupProduct;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductFaq;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Request;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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
    public $discountPercentage = 0;
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

    public $images = [];

    public $show_in_right_bar;

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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $rules = [
        'discountPercentage' => 'nullable|numeric|min:0|max:100',
        'images.*' => 'image|max:1024',
    ];

    protected $messages = [
        'discountPercentage.numeric' => 'درصد تخفیف نا معتبر است.',
        'discountPercentage.min' => 'درصد تخفیف نا معتبر است.',
        'discountPercentage.max' => 'درصد تخفیف نا معتبر است.',
    ];

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
                'show_in_right_bar' => (boolean)$this->show_in_right_bar,
            ]);

        foreach ($this->images as $key => $image)
        {
            $fileName = Str::random(16). '.' . $image->getClientOriginalExtension();
            $img = $image->storeAs('images', $fileName, 'parswebserver');
            $this->images[$key] = $image;
            ImageProduct::query()->create([
                'product_id' => $product->id,
                'name' => $img
            ]);
        }


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
