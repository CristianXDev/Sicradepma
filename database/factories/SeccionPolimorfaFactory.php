<?php

namespace Database\Factories;

use App\Models\SeccionPolimorfa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SeccionPolimorfaFactory extends Factory
{
    protected $model = SeccionPolimorfa::class;

    public function definition()
    {
        return [
			'id_seccion' => $this->faker->name,
			'id_estudiante' => $this->faker->name,
        ];
    }
}
