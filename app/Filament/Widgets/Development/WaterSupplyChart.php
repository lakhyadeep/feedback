<?php

namespace App\Filament\Widgets\Development;

use App\Models\Feedback;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class WaterSupplyChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Development & Infrastructure';
    protected static ?string $pollingInterval = null;
    protected static ?string $maxHeight = '210px';

    protected function getData(): array
    {
        $data = [];
        $startDate = $this->filters['start_date'] . ' 00:00:00' ?? now()->startOfMonth();
        $endDate = $this->filters['end_date'] . ' 23:59:59' ?? now()->endOfDay();
        $ward_id = $this->filters['ward_id'];


        $yesPercentage = Feedback::calculatePercentage('sanitation_water_supply_adequate', 1, $ward_id, ['start' => $startDate, 'end' => $endDate]);
        $noPercentage = Feedback::calculatePercentage('sanitation_water_supply_adequate', 0, $ward_id, ['start' => $startDate, 'end' => $endDate]);
        return [
            'datasets' => [
                [
                    'label' => 'Sanitation & Water supply',
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
                    'text' => "Sanitation & Water supply"
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
