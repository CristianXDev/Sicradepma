<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;

    public function definition()
    {
        return [
			'estado_id' => $this->faker->name,
			'nombre' => $this->faker->name,
			'apellido' => $this->faker->name,
			'cedula' => $this->faker->name,
			'grado' => $this->faker->name,
			'periodo' => $this->faker->name,
			'fecha_nacimiento' => $this->faker->name,
			'estatus' => $this->faker->name,
        ];
    }
}
