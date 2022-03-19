<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => rand(1, 10),
            'episode_id'    => rand(1, 10),
            'comment'       => $this->faker->text(240),
            'ip_address_location'   => $this->faker->ipv4()
        ];
    }
}
