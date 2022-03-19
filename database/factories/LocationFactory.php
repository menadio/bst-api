<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->region(),
            'latitude'  => $this->faker->latitude(5,14),
            'longitude' => $this->faker->longitude(2, 13)
        ];
    }
}
