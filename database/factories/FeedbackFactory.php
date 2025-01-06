<?php

namespace Database\Factories;

use App\Models\Ward;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FeedbackFactory extends Factory
{

    public function definition(): array
    {

        $five = [5, 4, 2, 2, 1];
        $four = [5, 4, 2, 2, 1];
        $yes_no = [1, 0];

        $most_critial_issue = [
            array('issue' => fake()->sentence(), 'issue' => fake()->optional()->sentence(), 'issue' => fake()->optional()->sentence()),
        ];

        $attach_file = array(
            array('file_name' => fake()->imageUrl()),
            array('file_name' => fake()->optional->imageUrl()),
            array('file_name' => fake()->optional->imageUrl())
        );

        return [
            'preferred_language' => fake()->randomElement(['en', 'bn', 'as', 'hi']),
            'ward_id' => Ward::inRandomOrder()->first()->id,
            'name' => fake()->name(),
            'address' => fake()->address(),
            'phone_no' => fake()->phoneNumber(),

            'accessibility' => fake()->randomElement($five),
            'responsiveness_grievances' => fake()->randomElement($five),
            'proactive_step_issues' => fake()->randomElement($four),
            'transparent_action_and_decision' => fake()->randomElement($yes_no),
            'suggestions' => fake()->text(),

            'roads_pavements' => fake()->randomElement($four),
            'drainage_system' => fake()->randomElement($four),
            'waste_management' => fake()->randomElement($four),
            'street_lighting' => fake()->randomElement($four),
            'parks_public_spaces' => fake()->randomElement($four),
            'sanitation_water_supply_adequate' => fake()->randomElement($yes_no),
            'feel_safe' => fake()->randomElement($yes_no),
            'environmentally_sustainable' => fake()->randomElement($yes_no),

            'attended_meeting_drive_event' => fake()->randomElement($yes_no),
            'opinions_considered_dev_plans' => fake()->randomElement($four),
            'communication_citizens_municipality' => fake()->randomElement($four),
            'most_critical_issues' => array_filter($most_critial_issue),
            'additional_suggestions' => fake()->text(),
            'attach_file' => array_filter($attach_file),
            'created_at' => fake()->dateTimeThisYear()
        ];
    }
}
