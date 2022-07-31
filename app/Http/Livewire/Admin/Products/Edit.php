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
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    protected $pageInfo = [
        'title' => 'ویرایش محصول',
    ];
    public $record;
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
    public $old_category_ids = [];

    public $groups;
    public $group_ids = [];
    public $old_group_ids = [];

    public $images = [];
    public $oldImages;

    public $show_in_right_bar;
    public $available_soon;


    public $home_most_sold;
    public $home_newest;
    public $home_suggestion;
    public $home_special;
    public $home_golsha_packs;

    public function updatePurchasePrice()
    {
        if(!empty($this->discountPercentage))
            $this->purchasePrice = ((100 - $this->discountPercentage) * $this->price) / 100;
        else
            $this->purchasePrice = $this->price;
    }

    public function destroyImage($id)
    {
        $image = ImageProduct::query()
            ->findOrFail($id);
        $image->delete();
        $this->oldImages = Product::query()->findOrFail($image->product_id)->images()->get();
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


    public function mount($record)
    {
        $this->record = $record;
        $this->categories = Category::all();
        $this->old_category_ids = CategoryProduct::query()
            ->where('product_id', $record->id)
            ->get()
            ->pluck('category_id')
            ->toArray();
        $this->category_ids = $this->old_category_ids;
        $this->title = $record->title;
        $this->sellerName = $record->seller_name;
        $this->ingredients = $record->ingredients;
        $this->size = $record->size;
        $this->virtues = $record->virtues;
        $this->introduction = $record->introduction;
        $this->price = $record->price;
        $this->discountPercentage = $record->discount_percentage;
        $this->show_in_right_bar = $record->show_in_right_bar;
        $this->available_soon = $record->available_soon;

        $this->home_most_sold = $record->home_most_sold;
        $this->home_newest = $record->home_newest;
        $this->home_suggestion = $record->home_suggestion;
        $this->home_special = $record->home_special;
        $this->home_golsha_packs = $record->home_golsha_packs;

        if(!empty($this->discountPercentage))
            $this->purchasePrice = ((100 - $this->discountPercentage) * $this->price) / 100;
        else
            $this->purchasePrice = $this->price;

        $this->oldImages = $record->images()->get();

    }
    public function render()
    {
        return view('livewire.admin.products.edit');
    }

    public function update($id)
    {
        $product = Product::query()
            ->where('id', $id)
            ->firstOrFail();
        $product->update([
                'title' => $this->title,
                'seller_name' => $this->sellerName,
                'ingredients' => $this->ingredients,
                'size' => $this->size,
                'virtues' => $this->virtues,
                'introduction' => $this->introduction,
                'price' => $this->price,
                'discount_percentage' => $this->discountPercentage,
                'show_in_right_bar' => (boolean)$this->show_in_right_bar,
                'available_soon' => (boolean)$this->available_soon,

                'home_most_sold' => (boolean)$this->home_most_sold,
                'home_newest' => (boolean)$this->home_newest,
                'home_suggestion' => (boolean)$this->home_suggestion,
                'home_special' => (boolean)$this->home_special,
                'home_golsha_packs' => (boolean)$this->home_golsha_packs,
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

        CategoryProduct::query()->where('product_id', $product->id)->delete();
        foreach ($this->category_ids as $category_id)
        {
            CategoryProduct::query()
                ->create([
                    'product_id' => $product->id,
                    'category_id' => $category_id
                ]);
        }

        session()->flash('message', 'محصول با موفقیت ویرایش شد.');
        redirect()->route('admin.products.index');
    }

    public function deleteProductFaq($faq_id)
    {
        ProductFaq::query()
            ->where('id', $faq_id)
            ->delete();

        return redirect()->route('admin.products.edit', $this->record->id);
    }

    public function deleteProductAttr($attr_id)
    {
        ProductAttribute::query()
            ->where('id', $attr_id)
            ->delete();

        return redirect()->route('admin.products.edit', $this->record->id);
    }
}
