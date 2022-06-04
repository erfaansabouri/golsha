<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryAndGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++)
        {
            Category::query()->create([
                'title' => "دسته بندی " . $i,
            ]);
        }

        for ($i=0;$i<10;$i++)
        {
            Group::query()->create([
                'title' => "گروه " . $i,
                'description' => 'سلامت با محصولات گلشا
سلامت با محصولات گلشا گلشا کوچک ترین عوارضی (چه در حین مصرف و چه در دراز مدت) نداره صحت این موضوع توسط کارشناس های تغذیه و مصرف کننده ها تایید شده. ترکیبات گلشا کاملا گیاهی هستن و بدون هیچ گونه عوارضی شما رو به تناسب اندام میرسونن
✔️ اطمینان از محصول باعث شده که تضمین سلامت شما عزیزان رو قرار بدیم ',
                'image_name' => 'images/sample.jpg'
            ]);
        }

        foreach (Product::all() as $product)
        {
            $category_ids = Category::query()->inRandomOrder()->take(2)->get()->pluck('id');
            $group_ids = Group::query()->inRandomOrder()->take(2)->get()->pluck('id');
            $product->categories()->sync($category_ids);
            $product->groups()->sync($group_ids);
        }
    }
}
