<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cep>
 */
class CepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $code = $this->faker->unique()->regexify("[0-9]{8}");
        return [
            'slug' => Str::slug($code),
            'code' => $code,
            'state' => $this->faker->stateAbbr,
            'city' => $this->faker->city,
            'district' => $this->faker->state,
            'address' => $this->faker->streetName,
        ];
    }
}
