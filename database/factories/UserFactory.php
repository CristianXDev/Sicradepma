<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
			'image' => $this->faker->name,
			'name' => $this->faker->name,
			'email' => $this->faker->name,
			'rol' => $this->faker->name,
        ];
    }
}
