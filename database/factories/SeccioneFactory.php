<?php

namespace Database\Factories;

use App\Models\Seccione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SeccioneFactory extends Factory
{
    protected $model = Seccione::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'num_estudiantes' => $this->faker->name,
        ];
    }
}
