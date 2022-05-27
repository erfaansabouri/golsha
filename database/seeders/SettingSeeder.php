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
        $this->footer();
        $this->socials();
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
	public function footer()
	{
		$items = [
			[
				'key' => 'footer-1',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-2',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-3',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-4',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-5',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-6',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-7',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-8',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-9',
				'value' => 'test test test 09',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-10',
				'value' => 'test test test 10',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-11',
				'value' => 'test test test 11',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-12',
				'value' => 'test test test 12',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-13',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'footer',
				'type' => 'image',
			],
			[
				'key' => 'footer-14',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-15',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'footer',
				'type' => 'image',
			],
			[
				'key' => 'footer-16',
				'value' => 'test test test',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-17',
				'value' => 'images/fdph4xhLT9hLaQYB.jpg',
				'category' => 'footer',
				'type' => 'image',
			],
		];
		
		foreach ($items as $item)
		{
			Setting::query()->create($item);
		}
	}
	public function socials()
	{
		$items = [
			[
				'key' => 'socials-1',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-2',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-3',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-4',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-5',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-6',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-7',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-8',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-9',
				'value' => 'test test test',
				'category' => 'socials',
				'type' => 'text',
			],
		];
		
		foreach ($items as $item)
		{
			Setting::query()->create($item);
		}
	}
}