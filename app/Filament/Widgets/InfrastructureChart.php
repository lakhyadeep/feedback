<?php

namespace App\Filament\Widgets;

use App\Models\Feedback;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class InfrastructureChart extends ChartWidget
{

    use InteractsWithPageFilters;
    protected static ?string $heading = 'Development & Infrastructure';
    protected static ?string $pollingInterval = null;


    protected function getData(): array
    {

        $startDate = $this->filters['start_date'] ?? now()->startOfMonth();
        $endDate = $this->filters['end_date'] ?? now();

        $performance = Feedback::performance($this->filters['ward_id'], $startDate, $endDate);
        return [
            'datasets' => [
                [
                    'label' => 'Roads & Pavements',
                    'data' => [$performance['average_roads_pavements']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_roads_pavements']),
                    'borderColor' => Feedback::getBarColor($performance['average_roads_pavements']),
                    'stack' => 'r',

                ],
                [
                    'label' => 'Drainage System',
                    'data' => [$performance['average_drainage_system']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_drainage_system']),
                    'borderColor' => Feedback::getBarColor($performance['average_drainage_system']),
                    'stack' => 'd',

                ],
                [
                    'label' => 'Waste Management',
                    'data' => [$performance['average_waste_management']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_waste_management']),
                    'borderColor' => Feedback::getBarColor($performance['average_waste_management']),
                    'stack' => 'w',
                ],
                [
                    'label' => 'Street Lighting',
                    'data' => [$performance['average_street_lighting']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_street_lighting']),
                    'borderColor' => Feedback::getBarColor($performance['average_street_lighting']),
                    'stack' => 's',
                ],
                [
                    'label' => 'Parks & Public Spaces',
                    'data' => [$performance['average_parks_public_spaces']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_parks_public_spaces']),
                    'borderColor' => Feedback::getBarColor($performance['average_parks_public_spaces']),
                    'stack' => 'p',
                ],

                [
                    'label' => 'Sanitation & Water Supply Yes(%)',
                    'data' => [$performance['percentage_sanitation_water_supply_adequate_yes']],
                    'backgroundColor' => 'green',
                    'borderColor' => 'green',
                    'stack' => 'sw',

                ],
                [
                    'label' => 'Sanitation & Water Supply No(%)',
                    'data' => [$performance['percentage_sanitation_water_supply_adequate_no']],
                    'backgroundColor' => 'red',
                    'borderColor' => 'red',
                    'stack' => 'sw',

                ],
                [
                    'label' => 'Feel Safe Yes(%)',
                    'data' => [$performance['percentage_feel_safe_yes']],
                    'backgroundColor' => 'green',
                    'borderColor' => 'green',
                    'stack' => 'fs',
                ],
                [
                    'label' => 'Feel Safe No(%)',
                    'data' => [$performance['percentage_feel_safe_no']],
                    'backgroundColor' => 'red',
                    'borderColor' => 'red',
                    'stack' => 'fs',
                ],
                [
                    'label' => 'Environmentally Sustainable Yes(%)',
                    'data' => [$performance['percentage_environmentally_sustainable_yes']],
                    'backgroundColor' => 'green',
                    'borderColor' => 'green',
                    'stack' => 'es',
                ],
                [
                    'label' => 'Environmentally Sustainable No(%)',
                    'data' => [$performance['percentage_environmentally_sustainable_no']],
                    'backgroundColor' => 'red',
                    'borderColor' => 'red',
                    'stack' => 'es',
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
