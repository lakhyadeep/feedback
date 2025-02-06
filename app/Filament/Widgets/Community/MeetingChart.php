<?php

namespace App\Filament\Widgets\Community;

use App\Models\Feedback;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class MeetingChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Community Engagement';
    protected static ?string $pollingInterval = null;
    protected static ?string $maxHeight = '210px';

    protected function getData(): array
    {

        if (isset($this->filters['start_date'])) {
            $startDate = $this->filters['start_date'] . ' 00:00:00';
        } else
            $startDate = now()->startOfYear();

        if (isset($this->filters['end_date'])) {
            $endDate = $this->filters['end_date'] . ' 23:59:59';
        } else
            $endDate = now()->endOfDay();

        if (isset($this->filters['ward_id'])) {
            $ward_id = $this->filters['ward_id'];
        } else
            $ward_id = request()->get('ward');

        $yesPercentage = Feedback::calculatePercentage('attended_meeting_drive_event', 1, $ward_id, ['start' => $startDate, 'end' => $endDate]);
        $noPercentage = Feedback::calculatePercentage('attended_meeting_drive_event', 0, $ward_id, ['start' => $startDate, 'end' => $endDate]);
        return [
            'datasets' => [
                [
                    'label' => 'Organized meetings,drives,events',
                    'data' => [$yesPercentage, $noPercentage],
                    'backgroundColor' => ['green', 'red'],
                    'hoverOffset' => 4
                ],
            ],

            'labels' => ['Yes', 'No'],

        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            //'indexAxis' => 'x',
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeInOutSine',
            ],
            'plugins' => [
                'title' => [
                    'display' => true,
                    'text' => "Organized meetings,drives,events"
                ],
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'x' => [
                    'ticks' => [
                        'display' => false // Hides x-axis labels
                    ]
                ],
                'y' => [
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => [
                        'display' => false // Hides x-axis labels
                    ]
                ],
            ],
        ];
    }
}
