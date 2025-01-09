<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Feedback;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class WardCompareChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Accessibility';
    protected static ?string $pollingInterval = null;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';

    public $stacked = false;

    protected function getData(): array
    {

        $data = [];
        $fiveColorRating = false;
        $param = $this->filters['param'];

        if (str_contains($param, '***p')) {
            $this->stacked = true;
            $param = substr($param, 0, -4);
        }

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
            'label' => [],
            'data' => $average,
            'backgroundColor' => $backgroundColor,
            'borderWidth' => 0,
        ];

        if ($this->stacked) {
            $percentages = Feedback::calculatePercentageWardWise($param);
            if (isset($percentages) && !empty($percentages)) {
                foreach ($percentages as $row) {
                    //$perWards[] = $row['ward_id'];
                    $yesPercentage[] = $row['yesPercentage'];
                    $noPercentage[] = $row['noPercentage'];
                }
            }


            $datasets = [
                [
                    'label' => [],
                    'data' => $yesPercentage,
                    'backgroundColor' => 'green',
                    'borderWidth' => 0,
                ],
                [
                    'label' => [],
                    'data' => $noPercentage,
                    'backgroundColor' => 'red',
                    'borderWidth' => 0,
                ]
            ];
        }

        //dd($this->stacked);
        // dd($datasets);

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
            //'indexAxis' => 'x',
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeInOutSine',
            ],
            'plugins' => [
                'title' => [
                    'display' => true,
                    //'text' => "Accessibility of WC",
                    'position' => "top"
                ],
                'legend' => [
                    'display' => false,
                ]
            ],
            'scales' => [
                'x' => [
                    'stacked' => ($this->stacked) ? true : false,
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'stacked' => ($this->stacked) ? true : false,
                    'grid' => [
                        'display' => false,
                        //'offset' => true
                    ],
                ],
            ],
        ];
    }
}
