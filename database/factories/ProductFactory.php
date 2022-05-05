<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ybazli\Faker\Faker;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => \Ybazli\Faker\Facades\Faker::word(),
            'seller_name' => \Ybazli\Faker\Facades\Faker::word(),
            'ingredients' => \Ybazli\Faker\Facades\Faker::sentence(),
            'size' => 400,
            'virtues' => \Ybazli\Faker\Facades\Faker::sentence(),
            'price' => rand(10000,30000),
            'introduction' => \Ybazli\Faker\Facades\Faker::paragraph(),
        ];
    }
}
