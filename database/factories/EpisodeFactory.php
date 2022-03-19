<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->sentence(2),
            'code'  => 'BKS' . rand(000, 100),
            'released_on'   => $this->faker->dateTime()
        ];
    }
}
