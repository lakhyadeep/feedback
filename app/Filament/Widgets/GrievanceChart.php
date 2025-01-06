<?php

namespace App\Filament\Widgets;

use App\Models\Feedback;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class GrievanceChart extends ChartWidget
{
    protected static ?string $heading = 'Responsiveness of WC to Grievances';
    protected static ?string $pollingInterval = null;


    protected function getData(): array
    {
        $data = Trend::model(Feedback::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfDay(),
            )
            ->perDay()
            ->average('responsiveness_grievances');
        return [
            'datasets' => [
                [
                    'label' => 'Responsiveness to Grievances',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => $data->map(function (TrendValue $value) {
                        if ($value->aggregate > 2.5)
                            return 'green';
                        else if ($value->aggregate < 2)
                            return 'red';
                        else
                            return 'orange';
                    }),
                    'borderWidth' => 0,
                ],
            ],

            'labels' => $data->map(fn(TrendValue $value) => $value->date),

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'x',
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
                'y' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }
}
