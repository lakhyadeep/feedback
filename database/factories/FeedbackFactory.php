<?php

namespace Database\Factories;

use App\Models\Ward;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FeedbackFactory extends Factory
{

    public function definition(): array
    {
        return [
            'preferred_language' => 'en',
            'ward_id' => Ward::inRandomOrder()->first()->id,
            'name' => fake()->name(),
            'address' => fake()->address(),
            'phone_no' => fake()->phoneNumber(),

            'accessibility' => fake()->randomElement(['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied']),
            'responsiveness_grievances' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Poor', 'Very Poor']),
            'proactive_step_issues' => fake()->randomElement(['Always', 'Sometimes', 'Rarely', 'Never']),
            'transparent_action_and_decision' => fake()->randomElement(['Yes', 'No']),
            'suggestions' => fake()->text(),

            'roads_pavements' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Poor']),
            'drainage_system' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Poor']),
            'waste_management' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Poor']),
            'street_lighting' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Poor']),
            'parks_public_spaces' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Poor']),
            'sanitation_water_supply_adequate' => fake()->randomElement(['Yes', 'No']),
            'feel_safe' => fake()->randomElement(['Yes', 'No']),
            'environmentally_sustainable' => fake()->randomElement(['Yes', 'No']),

            'attended_meeting_drive_event' => fake()->randomElement(['Yes', 'No']),
            'opinions_considered_dev_plans' => fake()->randomElement(['Always', 'Sometimes', 'Rarely', 'Never']),
            'communication_citizens_municipality' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Poor']),
            'most_critical_issues' => json_encode([fake()->sentence(), fake()->sentence(), fake()->sentence()]),
            'additional_suggestions' => fake()->text(),
        ];
    }
}
