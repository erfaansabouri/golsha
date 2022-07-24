<?php

namespace App\Http\Livewire\Admin\BehtarinCategories;

use App\Models\BehtarinCategoryProduct;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    protected $pageInfo = [
        'title' => 'ویرایش دسته بندی غذایی بهترین',
    ];
    public $record;
    /* Form inputs */
    public $title;
    public $oldImage;
    public $image;
    public $old_product_ids = [];
    public $all_products;
    public $product_ids = [];




    public function mount($record)
    {
        $this->record 		= $record;
        $this->title 		= $this->record->title;
        $this->oldImage 	= $this->record->imagePath;
        $this->old_product_ids = BehtarinCategoryProduct::query()
                                                        ->where('behtarin_category_id', $record->id)
                                                        ->get()
                                                        ->pluck('product_id')
                                                        ->toArray();
        $this->all_products = Product::all();

    }
    public function render()
    {
        return view('livewire.admin.behtarin-categories.edit')->with('pageInfo', $this->pageInfo);
    }

    public function update()
    {
        $this->record->title 	= $this->title;
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $this->record->image_name = $imageName;
        }
        $this->record->save();


        BehtarinCategoryProduct::query()
            ->where('behtarin_category_id', $this->record->id)
            ->delete();

        foreach ($this->product_ids as $product_id)
        {
            BehtarinCategoryProduct::query()
                ->create([
                    'product_id' => $product_id,
                    'behtarin_category_id' => $this->record->id,
                ]);
        }

        session()->flash('message', 'با موفقیت ویرایش شد.');
        redirect()->route('admin.behtarin-categories.index');
    }
}
