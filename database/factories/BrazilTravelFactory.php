<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BrazilTravel>
 */
class BrazilTravelFactory extends Factory
{
    protected $model = \App\Models\BrazilTravel::class;
    public function definition(): array
    {
        return [
            'img_name' => $this->faker->word,
            'destination' => $this->faker->city,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 2000),
        ];
    }
}
