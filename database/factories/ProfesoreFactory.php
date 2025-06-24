<?php

namespace Database\Factories;

use App\Models\Profesore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfesoreFactory extends Factory
{
    protected $model = Profesore::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellido' => $this->faker->name,
			'cedula' => $this->faker->name,
			'rol' => $this->faker->name,
			'estatus' => $this->faker->name,
        ];
    }
}
