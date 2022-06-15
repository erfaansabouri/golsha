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
        $this->blog();
        $this->sliders();
        $this->productBanners();
    }

	public function aboutUs()
	{
		$items = [
			[
				'key' => 'about-us-1',
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-2',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-3',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-4',
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-5',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-6',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-7',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-8',
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-9',
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-10',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-11',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
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
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-14',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
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
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-17',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
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
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-20',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
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
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'about-us',
				'type' => 'text',
			],
			[
				'key' => 'about-us-23',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
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
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-26',
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-27',
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-28',
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-29',
				'value' => 'images/sample.jpg',
				'category' => 'about-us',
				'type' => 'image',
			],
			[
				'key' => 'about-us-30',
				'value' => 'images/sample.jpg',
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
				'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'متن جلوی مشاوره و ثبت سفارش سریع در واتساپ و تلگرام'
			],
			[
				'key' => 'footer-2',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک واتساپ'
            ],
			[
				'key' => 'footer-3',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک تلگرام'
            ],
			[
				'key' => 'footer-4',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
				'location' => 'شماره جلوی کلمه تماس',
			],
			[
				'key' => 'footer-5',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
			],
			[
				'key' => 'footer-6',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک تلگرام',
            ],
			[
				'key' => 'footer-7',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک اینستاگرام',

            ],
			[
				'key' => 'footer-8',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک توییتر',
            ],
			[
				'key' => 'footer-9',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک آپارات',
            ],
			[
				'key' => 'footer-10',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'متن جلوی لوگو',
            ],
			[
				'key' => 'footer-11',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'footer',
				'type' => 'text',
                'location' => 'زیر متن جلوی لوگو',
            ],
			[
				'key' => 'footer-12',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک عکس اول',
            ],
			[
				'key' => 'footer-13',
				'value' => 'images/sample.jpg',
				'category' => 'footer',
				'type' => 'image',
                'location' => 'عکس اول',

            ],
			[
				'key' => 'footer-14',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک عکس دوم',
            ],
			[
				'key' => 'footer-15',
				'value' => 'images/sample.jpg',
				'category' => 'footer',
				'type' => 'image',
                'location' => 'عکس دوم',
            ],
			[
				'key' => 'footer-16',
                'value' => '09109272066',
				'category' => 'footer',
				'type' => 'text',
                'location' => 'لینک عکس سوم',
            ],
			[
				'key' => 'footer-17',
				'value' => 'images/sample.jpg',
				'category' => 'footer',
				'type' => 'image',
                'location' => 'عکس سوم',

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
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-2',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-3',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-4',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-5',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-6',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-7',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-8',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
			[
				'key' => 'socials-9',
				'value' => \Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'socials',
				'type' => 'text',
			],
		];

		foreach ($items as $item)
		{
			Setting::query()->create($item);
		}
	}
	public function blog()
	{
		$items = [
			[
				'key' => 'blog-1',
				'value' => 'images/sample.jpg',
				'category' => 'blog',
				'href' => 'https://google.com',
				'type' => 'image',
			],
			[
				'key' => 'blog-2',
				'value' => 'images/sample.jpg',
				'category' => 'blog',
				'href' => 'https://google.com',
				'type' => 'image',
			],
			[
				'key' => 'blog-3',
				'value' => 'images/sample.jpg',
				'category' => 'blog',
				'href' => 'https://google.com',
				'type' => 'image',
			],
			[
				'key' => 'blog-4',
				'value' => 'https://google.com',
				'category' => 'blog',
				'type' => 'text',
			],
			[
				'key' => 'blog-5',
				'value' => 'https://google.com',
				'category' => 'blog',
				'type' => 'text',
			],
			[
				'key' => 'blog-6',
				'value' => \Ybazli\Faker\Facades\Faker::sentence().\Ybazli\Faker\Facades\Faker::sentence().\Ybazli\Faker\Facades\Faker::sentence(),
				'category' => 'blog',
				'type' => 'text',
			],
		];

		foreach ($items as $item)
		{
			Setting::query()->create($item);
		}
	}
    public function sliders()
    {
        $items = [
            [
                'key' => 'sliders-1',
                'value' => 'images/sample.jpg',
                'category' => 'sliders',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
            [
                'key' => 'sliders-2',
                'value' => 'images/sample.jpg',
                'category' => 'sliders',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
            [
                'key' => 'sliders-3',
                'value' => 'images/sample.jpg',
                'category' => 'sliders',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
            [
                'key' => 'sliders-4',
                'value' => 'images/sample.jpg',
                'category' => 'sliders',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
            [
                'key' => 'sliders-5',
                'value' => 'images/sample.jpg',
                'category' => 'sliders',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
        ];

        foreach ($items as $item)
        {
            Setting::query()->create($item);
        }
    }

    public function productBanners()
    {
        $items = [
            [
                'key' => 'product-banner-1',
                'value' => 'images/sample.jpg',
                'category' => 'product-banner',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
            [
                'key' => 'product-banner-2',
                'value' => 'images/sample.jpg',
                'category' => 'product-banner',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
            [
                'key' => 'product-banner-3',
                'value' => 'images/sample.jpg',
                'category' => 'product-banner',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
            [
                'key' => 'product-banner-4',
                'value' => 'images/sample.jpg',
                'category' => 'product-banner',
                'href' => 'https://google.com',
                'type' => 'image',
            ],
        ];

        foreach ($items as $item)
        {
            Setting::query()->create($item);
        }
    }

}
