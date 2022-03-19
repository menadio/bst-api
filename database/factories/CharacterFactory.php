<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genderList = ['male', 'female'];
        $gender = $genderList[array_rand($genderList,1)];

        return [
            'first_name'        => $this->faker->firstname($gender),
            'last_name'         => $this->faker->lastname($gender),
            'status_id'         => rand(1, 3),
            'state_of_origin'   => $this->faker->region(),
            'gender'            => $gender,
            'location_id'       => rand(1, 5)
        ];  
    }
}
