<?php

namespace App\Filament\Widgets;

use App\Models\Feedback;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class WardCompareChart extends ChartWidget
{
    use InteractsWithPageFilters;

    // protected static ?string $heading = 'Accessibility';
    protected static ?string $pollingInterval = null;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';


    protected function getData(): array
    {

        $data = [];
        $fiveColorRating = false;
        $param = $this->filters['param'];


        if (str_contains($param, '***f')) {
            $fiveColorRating = true;
            $param = substr($param, 0, -4);
        }
        //dd($param);
        $data = Feedback::calcutateParameterAverageWardWise($param);
        if (isset($data) && !empty($data)) {
            foreach ($data as $row) {
                $wards[] = 'Ward No' . ' ' . $row['ward_id'];
                $average[] = $row['average'];
                $backgroundColor[] = Feedback::setColorBasedOnRating($fiveColorRating, $row['average']);
            }
        }

        $datasets[] = [
            // 'label' => [],
            'data' => $average,
            'backgroundColor' => $backgroundColor,
            'borderWidth' => 0,
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
                    'position' => "top",
                ],
                'legend' => [
                    'display' => false,
                ]
            ],
            'scales' => [
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'grid' => [
                        'display' => true,
                        //'offset' => true
                    ],
                ],
            ],
        ];
    }
}
