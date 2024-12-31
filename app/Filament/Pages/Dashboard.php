<?php

namespace App\Filament\Pages;

use App\Models\Ward;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
use App\Filament\Widgets\PerformanceChart;
use App\Filament\Widgets\InfrastructureChart;
use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\CommunityEngagementChart;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    protected static ?string $title = 'Dashboard';

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('ward_id')
                            ->label('Ward Number')
                            ->options(Ward::all()->pluck('title', 'id'))
                            ->required(),

                        DatePicker::make('start_date')
                            ->label('Start Date'),

                        DatePicker::make('end_date')
                            ->label('End Date'),
                    ])
                    ->columns(3),
            ]);
    }

    public function getWidgets(): array
    {
        return [
            PerformanceChart::class,
            InfrastructureChart::class,
            CommunityEngagementChart::class,
        ];
    }
}
