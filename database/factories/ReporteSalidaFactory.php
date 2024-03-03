<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReporteSalida>
 */
class ReporteSalidaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fechaReporte' => $this->faker->date(),
            'descripcion' => $this->faker->sentence(),
            'idUsuario' => $this->faker->numberBetween(1,3)
        ];
    }
}
