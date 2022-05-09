<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => \Ybazli\Faker\Facades\Faker::firstName(),
            'last_name' => \Ybazli\Faker\Facades\Faker::lastName(),
            'phone_number' => rand(1000,99999999),
            'phone_number_verified_at' => Carbon::now(),
            'sex' => "مرد",
            'email' => $this->faker->email,
            'birthday' => Carbon::now()->subYears(30),
        ];
    }
}
