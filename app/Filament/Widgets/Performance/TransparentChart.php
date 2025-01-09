<?php

namespace App\Filament\Widgets\Performance;

use App\Models\Feedback;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class TransparentChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Transparent in actions and decisions';
    protected static ?string $pollingInterval = null;
    protected static ?string $maxHeight = '210px';

    protected function getData(): array
    {
        $data = [];
        $startDate = $this->filters['start_date'] . ' 00:00:00' ?? now()->startOfMonth();
        $endDate = $this->filters['end_date'] . ' 23:59:59' ?? now()->endOfDay();
        $ward_id = $this->filters['ward_id'];


        $yesPercentage = Feedback::calculatePercentage('transparent_action_and_decision', 1, $ward_id, ['start' => $startDate, 'end' => $endDate]);
        $noPercentage = Feedback::calculatePercentage('transparent_action_and_decision', 0, $ward_id, ['start' => $startDate, 'end' => $endDate]);
        return [
            'datasets' => [
                [
                    'label' => 'Transparent in actions and decisions',
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
                // 'legend' => [
                //     'display' => false,
                //     'align' => 'start',
                // ],
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
