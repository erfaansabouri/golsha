<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		FaqCategory::query()->truncate();
		Faq::query()->truncate();
        $faqCategories = [
			[
				'title' => 'دسته 1',
			],
			[
				'title' => 'دسته 2',
			],
			[
				'title' => 'دسته 3',
			],
			[
				'title' => 'دسته 4',
			],
			[
				'title' => 'دسته 5',
			],
			[
				'title' => 'دسته 6',
			],
			[
				'title' => 'دسته 7',
			],
		];
		
		foreach ($faqCategories as $faqCategory)
		{
			FaqCategory::query()
				->create($faqCategory);
		}
		
		for($i=0; $i<30; $i++)
		{
			Faq::query()
				->create([
								 'faq_category_id' => FaqCategory::query()->inRandomOrder()->first()->id,
								 'question' => \Ybazli\Faker\Facades\Faker::sentence(),
								 'answer' => \Ybazli\Faker\Facades\Faker::sentence(),
							 ]);
		}
    }
}
