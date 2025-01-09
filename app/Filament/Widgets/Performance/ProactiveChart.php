<?php

namespace App\Filament\Widgets\Performance;

use Carbon\Carbon;
use App\Models\Feedback;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class ProactiveChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Proactive steps to address key Issues';
    protected static ?string $pollingInterval = null;


    protected function getData(): array
    {
        $data = [];
        $startDate = $this->filters['start_date'] . ' 00:00:00' ?? now()->startOfMonth();
        $endDate = $this->filters['end_date'] . ' 23:59:59' ?? now()->endOfDay();
        $ward_id = $this->filters['ward_id'];

        $data = Trend::query(Feedback::where('ward_id', $ward_id))
            ->between(
                start: Carbon::parse($startDate),
                end: Carbon::parse($endDate),
            )
            ->perDay()
            ->average('proactive_step_issues');
        return [
            'datasets' => [
                [
                    'label' => 'Proactive steps to address key Issues',
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
