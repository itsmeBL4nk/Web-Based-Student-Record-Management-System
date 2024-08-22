<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lrn' => $this->faker->randomDigit(),
            'lname' => $this->faker->name(),
            'fname' => $this->faker->name(),
            'mid_name' => $this->faker->name(),
            'gender' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
          
            'phone_num' => $this->faker->randomDigit(),
            'address' => $this->faker->city(),
            'grade' => $this->faker->randomDigit(),
            'strand' => $this->faker->name(),
            'section_id' => $this->faker->randomDigit(),
            
        ];
    }
}
