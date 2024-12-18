<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FeedbackFactory extends Factory
{


    //protected $model = Feedback::class;


    public function definition(): array
    {
        return [
            'preferred_language' => 'en',
            'ward_id' => 1,
            'name' => fake()->name(),
            'address' => fake()->address(),
            'phone_no' => fake()->phoneNumber(),
            'accessibility' => fake()->randomElement(['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied']),
            'responsiveness' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Poor', 'Very Poor'])
        ];
    }
}
