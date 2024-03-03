<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'estado' => $this->faker->numberBetween(0,1),
            'SKU' => $this->faker->unique()->regexify('[A-Z0-9]{9}'),
            'nombre' => $this->faker->word(),
            'precio' => $this->faker->numberBetween(1.00,9.99),
            'stock' => $this->faker->numberBetween(1,50),
            'fechaVencimiento' => $this->faker->dateTimeBetween('2024-03-01', '2025-04-30'),
            'categoria' => $this->faker->randomElement(['Galletas','Verduras','Gaseosas','Hidratante','Agua Mineral','Alcohol']),

        ];
    }
}
