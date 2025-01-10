<?php

namespace App\Filament\Pages;

use App\Models\Ward;
use Filament\Forms\Form;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\Development\ParkChart;
use App\Filament\Widgets\Development\RoadChart;
use App\Filament\Widgets\Development\SafeChart;
use App\Filament\Widgets\Community\MeetingChart;
use App\Filament\Widgets\Community\OpinionChart;
use App\Filament\Widgets\Development\WasteChart;
use App\Filament\Widgets\Development\DrainageChart;
use App\Filament\Widgets\Performance\GrievanceChart;
use App\Filament\Widgets\Performance\ProactiveChart;
use App\Filament\Widgets\Development\EnviromentChart;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use App\Filament\Widgets\Community\CommunicationChart;
use App\Filament\Widgets\Development\StreetLightChart;
use App\Filament\Widgets\Development\WaterSupplyChart;
use App\Filament\Widgets\Performance\TransparentChart;
use App\Filament\Widgets\Performance\AccessibilityChart;

class WardOverview extends BaseDashboard
{
    use HasFiltersForm;

    protected static string $routePath = '/ward/overview';
    protected static ?string $title = 'Ward Overview';

    public static function getNavigationLabel(): string
    {
        return 'Ward Overview';
    }

    public static function getNavigationIcon(): string
    {
        return static::$navigationIcon
            ?? (Filament::hasTopNavigation() ? 'heroicon-m-chart-pie' : 'heroicon-o-chart-pie');
    }

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
                            ->default('1')
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

            ///Performance
            AccessibilityChart::class,
            GrievanceChart::class,
            ProactiveChart::class,
            TransparentChart::class,
            /////Devlopment
            RoadChart::class,
            DrainageChart::class,
            WasteChart::class,
            StreetLightChart::class,
            ParkChart::class,
            WaterSupplyChart::class,
            SafeChart::class,
            EnviromentChart::class,
            ///Community
            MeetingChart::class,
            OpinionChart::class,
            CommunicationChart::class


        ];
    }
}
