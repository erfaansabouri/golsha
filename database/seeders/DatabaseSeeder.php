<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(100)->create();
        User::factory(100)->create();
        Coupon::factory(100)->create();
        Comment::factory(100)->create();
        BlogPost::factory(100)->create();
		$this->call(SettingSeeder::class);
		$this->call(FaqSeeder::class);
		$this->call(BlogCategorySeeder::class);
		
    }
}
