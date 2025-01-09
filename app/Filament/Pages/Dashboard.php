<?php

namespace App\Filament\Pages;

use App\Models\Ward;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use App\Filament\Widgets\Performance\GrievanceChart;
use App\Filament\Widgets\Performance\ProactiveChart;
use Filament\Forms\Components\DatePicker;
use App\Filament\Widgets\Performance\TransparentChart;
use App\Filament\Widgets\Performance\AccessibilityChart;
use Filament\Pages\Dashboard as BaseDashboard;
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
                            ->searchable()
                            ->label('Ward Number')
                            ->options(Ward::all()->pluck('title', 'id'))
                            ->required(),

                        DatePicker::make('start_date')
                            ->label('Start Date')
                            ->default(now()->startOfMonth())
                            ->required(),

                        DatePicker::make('end_date')
                            ->label('End Date')
                            ->default(now()->endOfDay())
                            ->required(),
                    ])
                    ->columns(3),
            ]);
    }

    public function getWidgets(): array
    {
        return [
            AccessibilityChart::class,
            GrievanceChart::class,
            ProactiveChart::class,
            TransparentChart::class
        ];
    }
}
