<?php

namespace App\Filament\Widgets;

use App\Models\Feedback;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;


class PerformanceChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Performance of WC';
    protected static ?string $pollingInterval = null;

    protected function getData(): array
    {
        $startDate = $this->filters['start_date'] ?? now()->startOfMonth();
        $endDate = $this->filters['end_date'] ?? now();
        $performance = Feedback::performance($this->filters['ward_id'], $startDate, $endDate);
        return [
            'datasets' => [
                [
                    'label' => 'Accessibility of WC',
                    'data' => [$performance['average_accessibility']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_accessibility']),
                    'borderColor' => Feedback::getBarColor($performance['average_accessibility']),
                    'stack' => 'a',

                ],
                [
                    'label' => 'Responsiveness of WC to Grievances',
                    'data' => [$performance['average_responsiveness_grievances']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_responsiveness_grievances']),
                    'borderColor' => Feedback::getBarColor($performance['average_responsiveness_grievances']),
                    'stack' => 'r',

                ],
                [
                    'label' => 'Proactive Step Issues',
                    'data' => [$performance['average_proactive_step_issues']],
                    'backgroundColor' => Feedback::getBarColor($performance['average_proactive_step_issues']),
                    'borderColor' => Feedback::getBarColor($performance['average_proactive_step_issues']),
                    'stack' => 'p',

                ],
                [
                    'label' => 'Transparent Action and Decision Yes(%)',
                    'data' => [$performance['percentage_transparent_action_and_decision_yes']],
                    'backgroundColor' => 'green',
                    'borderColor' => 'green',
                    'stack' => 't',

                ],
                [
                    'label' => 'Transparent Action and Decision No(%)',
                    'data' => [$performance['percentage_transparent_action_and_decision_no']],
                    'backgroundColor' => 'red',
                    'borderColor' => 'red',
                    'stack' => 't',

                ],
            ],
            'labels' => ['']
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
