<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\CategoryPost;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		BlogCategory::query()->truncate();
		CategoryPost::query()->truncate();
		
        $blogCategories = [
			[
				'title' => 'اتاق خبر گلشا',
			],
			[
				'title' => 'زیبایی',
			],
			[
				'title' => 'بیماری ها',
			],
			[
				'title' => 'طب سنتی و گیاهان',
			],
			[
				'title' => 'سبک زندگی',
			],
			[
				'title' => 'تغذیه',
			],
			[
				'title' => 'تناسب اندام',
			],
		];
		
		foreach ($blogCategories as $item)
		{
			BlogCategory::query()->create(['title' => $item['title']]);
		}
		
		for($i=0; $i<30; $i++)
		{
			CategoryPost::query()
				->create([
								 'blog_post_id' => BlogPost::query()->inRandomOrder()->first()->id,
								 'blog_category_id' => BlogCategory::query()->inRandomOrder()->first()->id,
							 ]);
		}
    }
}
