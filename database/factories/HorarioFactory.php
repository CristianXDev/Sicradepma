<?php

namespace Database\Factories;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HorarioFactory extends Factory
{
    protected $model = Horario::class;

    public function definition()
    {
        return [
			'id_seccion' => $this->faker->name,
			'id_profesor' => $this->faker->name,
			'dia_semana' => $this->faker->name,
			'actividad' => $this->faker->name,
			'hora_ini' => $this->faker->name,
			'hora_fin' => $this->faker->name,
        ];
    }
}
