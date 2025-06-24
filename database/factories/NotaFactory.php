<?php

namespace Database\Factories;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NotaFactory extends Factory
{
    protected $model = Nota::class;

    public function definition()
    {
        return [
			'id_estudiante' => $this->faker->name,
			'primer_lapso' => $this->faker->name,
			'segundo_lapso' => $this->faker->name,
			'tercer_lapso' => $this->faker->name,
			'nota_final' => $this->faker->name,
        ];
    }
}
