<?php

namespace App\Http\Livewire\Admin\BehtarinCategories;

use App\Models\BehtarinCategory;
use App\Models\BehtarinCategoryProduct;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected $pageInfo = [
        'title' => 'ایجاد دسته گروه غدایی بهترین',
    ];
    public $record;
    public $title;
    public $image;
    public $all_products;
    public $product_ids = [];

    public function mount()
    {
        $this->all_products = Product::all();
    }



    public function render()
    {
        return view('livewire.admin.behtarin-categories.create')->with('pageInfo', $this->pageInfo);
    }

    public function update()
    {
        $record = new BehtarinCategory();
        $record->title = $this->title;
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $record->image_name = $imageName;
        }
        $record->save();

        BehtarinCategoryProduct::query()
            ->where('behtarin_category_id', $record->id)
            ->delete();

        foreach ($this->product_ids as $product_id)
        {
            BehtarinCategoryProduct::query()
                ->create([
                    'product_id' => $product_id,
                    'behtarin_category_id' => $record->id,
                ]);
        }

        session()->flash('message', 'موفقیت ایجاد شد.');
        redirect()->route('admin.behtarin-categories.index');
    }
}
