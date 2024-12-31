<?php

namespace App\Filament\Widgets;

use App\Models\Feedback;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class CommunityEngagementChart extends ChartWidget
{
    use InteractsWithPageFilters;
    protected static ?string $heading = 'Community Engagement';
    protected static ?string $pollingInterval = null;


    protected function getData(): array
    {
        $startDate = $this->filters['start_date'] ?? now()->startOfMonth();
        $endDate = $this->filters['end_date'] ?? now();

        $performance = Feedback::performance($this->filters['ward_id'], $startDate, $endDate);
        //dd($performance);
        return [
            'datasets' => [
                [
                    'label' => 'Organized meeting, drives, event Yes(%)',
                    'data' => [$performance['percentage_attended_meeting_drive_event_yes'] ?? 0],
                    'backgroundColor' => 'green',
                    'borderColor' => 'green',
                    'stack' => 'es',
                ],
                [
                    'label' => 'Organized meeting, drives, event No(%)',
                    'data' => [$performance['percentage_attended_meeting_drive_event_no']],
                    'backgroundColor' => 'red',
                    'borderColor' => 'red',
                    'stack' => 'es',
                ],

                [
                    'label' => 'Citizen Opinions Considered',
                    'data' => [$performance['average_opinions_considered_dev_plans']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_opinions_considered_dev_plans']),
                    'borderColor' => Feedback::getBarColor($performance['average_opinions_considered_dev_plans']),
                    'stack' => 'o',
                ],
                [
                    'label' => 'Communication between Citizens & DMC',
                    'data' => [$performance['average_communication_citizens_municipality']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_communication_citizens_municipality']),
                    'borderColor' => Feedback::getBarColor($performance['average_communication_citizens_municipality']),
                    'stack' => 'c',
                ],
            ],
            'labels' => [''],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeInOutSine',
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                    'align' => 'start',
                ],
            ],
            'scales' => [
                'x' => [
                    'stacked' => true,

                ],

                'y' => [
                    'stacked' => true,
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }
}
