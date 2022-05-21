<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.\Ybazli\Faker\Facades\Faker::word()
     *
     * @return array
     */
    public function definition()
    {
        return [
            'admin_id' => Admin::query()->inRandomOrder()->first()->id,
            'title' => \Ybazli\Faker\Facades\Faker::word(),
            'body' => \Ybazli\Faker\Facades\Faker::sentence(). ' ' .\Ybazli\Faker\Facades\Faker::sentence(),
        ];
    }
}
