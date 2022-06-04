<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'title' => \Ybazli\Faker\Facades\Faker::sentence(),
            'body' => \Ybazli\Faker\Facades\Faker::sentence(),
            'commentable_id' => Product::query()->inRandomOrder()->first()->id,
            'commentable_type' => Product::class,
            'verified_at' => Carbon::now(),
        ];
    }
}
