<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Feedback;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Feedbacks', Feedback::count()),
            Stat::make('Today Feedbacks', Feedback::whereDate('created_at', Carbon::today())->count()),
            Stat::make('This Month Feedbacks', Feedback::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count()),
        ];
    }
}
