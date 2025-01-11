<?php

namespace App\Filament\Widgets;

use App\Models\Feedback;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class WardCompareStackedChart extends ChartWidget
{
    use InteractsWithPageFilters;

    // protected static ?string $heading = 'Accessibility';
    protected static ?string $pollingInterval = null;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';



    protected function getData(): array
    {
        $data = [];
        $param = $this->filters['param'];
        if (str_contains($param, '***p')) {

            $param = substr($param, 0, -4);
        }

        //dd($param);

        $percentages = Feedback::calculatePercentageWardWise($param);
        if (isset($percentages) && !empty($percentages)) {
            foreach ($percentages as $row) {
                $wards[] = 'Ward No' . ' ' . $row['ward_id'];
                $yesPercentage[] = $row['yesPercentage'];
                $noPercentage[] = $row['noPercentage'];
            }
        }

        $datasets = [
            [
                //'label' => [],
                'data' => $yesPercentage,
                'backgroundColor' => 'green',
                'borderWidth' => 0,
            ],
            [
                //'label' => [],
                'data' => $noPercentage,
                'backgroundColor' => 'red',
                'borderWidth' => 0,
            ]
        ];

        return [
            'datasets' => $datasets,
            'labels' => $wards,

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeInOutSine',
            ],
            'plugins' => [
                'title' => [
                    'display' => true,
                    'position' => "top"
                ],

                'legend' => [
                    'display' => false,
                ]
            ],
            'scales' => [
                'x' => [
                    'stacked' => true,
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'stacked' =>  true,
                    'grid' => [
                        'display' => true,
                    ],
                ],
            ],
        ];
    }
}
