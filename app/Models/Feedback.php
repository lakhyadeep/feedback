<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{

    use HasFactory;

    const FIVE_VALUE = 5;
    const FOUR_VALUE = 4;
    const THREE_VALUE = 3;
    const TWO_VALUE = 2;
    const ONE_VALUE = 1;
    const ZERO_VALUE = 0;

    protected $table = "feedbacks";

    protected $casts = [
        'most_critical_issues' => 'array',
        'attach_file' => 'array'
    ];

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class)->orderBy('id', 'asc');
    }

    public function scopePerformance($query, $wardId, $startDate, $endDate)
    {
        $data = [];
        $accessibility = [];
        $responsiveness_grievances = [];
        $proactive_step_issues = [];
        $total_transparent_yes = 0;
        $total_transparent_no = 0;
        $total_feedback = 0;


        $roads_pavements = [];
        $drainage_system = [];
        $waste_management = [];
        $street_lighting = [];
        $parks_public_spaces = [];
        $sanitation_water_supply_adequate_yes = 0;
        $sanitation_water_supply_adequate_no = 0;
        $feel_safe_yes = 0;
        $feel_safe_no = 0;
        $environmentally_sustainable_yes = 0;
        $environmentally_sustainable_no = 0;

        $opinions_considered_dev_plans = [];
        $communication_citizens_municipality = [];
        $total_attended_meeting_drive_event_yes = 0;
        $total_attended_meeting_drive_event_no = 0;


        $result = $query->where('ward_id', $wardId)
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            })->get();

        if (isset($result) && !empty($result)) {
            foreach ($result as $row) {

                /////////// Performance ///////////
                $accessibility[] = $this->convertToNumericValue($row->accessibility);
                $responsiveness_grievances[] = $this->convertToNumericValue($row->responsiveness_grievances);
                $proactive_step_issues[] = $this->convertToNumericValue($row->proactive_step_issues);

                if ($row->transparent_action_and_decision === 'Yes') {
                    $total_transparent_yes++;
                }
                if ($row->transparent_action_and_decision === 'No') {
                    $total_transparent_no++;
                }

                /////////// Infrastructure ///////////
                $roads_pavements[] = $this->convertToNumericValue($row->roads_pavements);
                $drainage_system[] = $this->convertToNumericValue($row->drainage_system);
                $waste_management[] = $this->convertToNumericValue($row->waste_management);
                $street_lighting[] = $this->convertToNumericValue($row->street_lighting);
                $parks_public_spaces[] = $this->convertToNumericValue($row->parks_public_spaces);

                if ($row->sanitation_water_supply_adequate === 'Yes') {
                    $sanitation_water_supply_adequate_yes++;
                }
                if ($row->sanitation_water_supply_adequate === 'No') {
                    $sanitation_water_supply_adequate_no++;
                }

                if ($row->feel_safe === 'Yes') {
                    $feel_safe_yes++;
                }
                if ($row->feel_safe === 'No') {
                    $feel_safe_no++;
                }
                if ($row->environmentally_sustainable === 'Yes') {
                    $environmentally_sustainable_yes++;
                }
                if ($row->environmentally_sustainable === 'No') {
                    $environmentally_sustainable_no++;
                }

                /////////// Community Engagement ///////////
                if ($row->attended_meeting_drive_event === 'Yes') {
                    $total_attended_meeting_drive_event_yes++;
                }
                if ($row->attended_meeting_drive_event === 'No') {
                    $total_attended_meeting_drive_event_no++;
                }
                $opinions_considered_dev_plans[] = $this->convertToNumericValue($row->opinions_considered_dev_plans);
                $communication_citizens_municipality[] = $this->convertToNumericValue($row->communication_citizens_municipality);
            }
            $total_feedback = count($result);
            $data['total_feedback'] = $total_feedback;
            $data['average_accessibility'] =  $this->getAverage($accessibility, $total_feedback);
            $data['average_responsiveness_grievances'] = $this->getAverage($responsiveness_grievances, $total_feedback);
            $data['average_proactive_step_issues'] = $this->getAverage($proactive_step_issues, $total_feedback);
            $data['percentage_transparent_action_and_decision_yes'] = $this->getPercentage($total_transparent_yes, $total_feedback);
            $data['percentage_transparent_action_and_decision_no'] = $this->getPercentage($total_transparent_no, $total_feedback);

            $data['average_roads_pavements'] = $this->getAverage($roads_pavements, $total_feedback);
            $data['average_drainage_system'] = $this->getAverage($drainage_system, $total_feedback);
            $data['average_waste_management'] = $this->getAverage($waste_management, $total_feedback);
            $data['average_street_lighting'] = $this->getAverage($street_lighting, $total_feedback);
            $data['average_parks_public_spaces'] = $this->getAverage($parks_public_spaces, $total_feedback);
            $data['percentage_sanitation_water_supply_adequate_yes'] = $this->getPercentage($sanitation_water_supply_adequate_yes, $total_feedback);
            $data['percentage_sanitation_water_supply_adequate_no'] = $this->getPercentage($sanitation_water_supply_adequate_no, $total_feedback);
            $data['percentage_feel_safe_yes'] = $this->getPercentage($feel_safe_yes, $total_feedback);
            $data['percentage_feel_safe_no'] = $this->getPercentage($feel_safe_no, $total_feedback);
            $data['percentage_environmentally_sustainable_yes'] = $this->getPercentage($environmentally_sustainable_yes, $total_feedback);
            $data['percentage_environmentally_sustainable_no'] = $this->getPercentage($environmentally_sustainable_no, $total_feedback);

            /////////// Community Engagement ///////////
            $data['average_opinions_considered_dev_plans'] = $this->getAverage($opinions_considered_dev_plans, $total_feedback);
            $data['average_communication_citizens_municipality'] = $this->getAverage($communication_citizens_municipality, $total_feedback);
            $data['percentage_attended_meeting_drive_event_yes'] = $this->getPercentage($total_attended_meeting_drive_event_yes, $total_feedback);
            $data['percentage_attended_meeting_drive_event_no'] = $this->getPercentage($total_attended_meeting_drive_event_no, $total_feedback);
        }
        return $data;
    }

    private function getAverage($array, $totalCount)
    {
        try {
            return array_sum($array) / $totalCount;
        } catch (\DivisionByZeroError $e) {
            return 0;
        }
    }

    private function getPercentage($value, $totalCount)
    {
        try {
            return ($value / $totalCount) * 100;
        } catch (\DivisionByZeroError $e) {
            return 0;
        }
    }

    private function convertToNumericValue($value)
    {
        if ($value == 'Very Satisfied' || $value == 'Excellent') {
            return self::FIVE_VALUE;
        }
        if ($value == 'Satisfied' || $value == 'Good' || $value == 'Always') {
            return self::FOUR_VALUE;
        }
        if ($value == 'Neutral' || $value == 'Average' || $value == 'Sometimes') {
            return self::THREE_VALUE;
        }
        if ($value == 'Dissatisfied' || $value == 'Poor' || $value == 'Rarely') {
            return self::TWO_VALUE;
        }
        if ($value == 'Very Dissatisfied' || $value == 'Very Poor' || $value == 'Never' || $value == 'Yes') {
            return self::ONE_VALUE;
        }
        return self::ZERO_VALUE;
    }


    public static function getBarColor($value)
    {
        if ($value > 2.5) {
            return 'green';
        }
        if ($value < 2) {
            return 'red';
        }
        return 'orange';
    }
}
