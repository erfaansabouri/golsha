<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Setting::query()->truncate();
        $this->aboutUs();
    }
	
	public function aboutUs()
	{
		$items = [
			[
				'key' => 'about-us-1',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-2',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-3',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-4',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-5',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-6',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-7',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-8',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-9',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-10',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-11',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-12',
				'value' => 'ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-13',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-14',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-15',
				'value' => 'ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-16',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-17',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-18',
				'value' => 'ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-19',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-20',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-21',
				'value' => 'ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-22',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-23',
				'value' => 'متن تست',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-24',
				'value' => 'ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری ابر آروان شرکتی های‌تک در حوزه‌ی فناوری ابری است که کار خود را از سال ۱۳۹۴ آغاز کرده است و با ده‌ها محصول و قابلیت ابری مختلف مانند شبکه توزیع محتوا (CDN)، سرور ابری',
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-25',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-26',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-27',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-28',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-29',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-30',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
		];
		
		foreach ($items as $item)
		{
			Setting::query()->create($item);
		}
	}
}
