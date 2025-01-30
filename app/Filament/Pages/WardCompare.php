<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\WardCompareChart;
use App\Filament\Widgets\WardCompareStackedChart;
use Filament\Forms\Form;
use Filament\Facades\Filament;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class WardCompare extends BaseDashboard
{
    use HasFiltersForm;

    protected static string $routePath = '/ward/comparison';
    protected static ?string $title = 'Ward Comparison';


    public static function getNavigationLabel(): string
    {
        return 'Ward Comparison';
    }

    public static function getNavigationIcon(): string
    {
        return static::$navigationIcon
            ?? (Filament::hasTopNavigation() ? 'heroicon-m-scale' : 'heroicon-o-scale');
    }

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make("param")
                            ->searchable()
                            ->label('Select Parameter')
                            ->options([
                                'Performance of WC' => [
                                    'accessibility***f' => 'Accessibility',
                                    'responsiveness_grievances***f' => 'Responsiveness to grievances',
                                    'proactive_step_issues***f' => 'Proactive step to address key issues',
                                    'transparent_action_and_decision***p' => 'Transparent in actions and decisions'
                                ],
                                'Development & Infrastructure' => [
                                    'roads_pavements' => 'Roads and Pavements',
                                    'drainage_system' => 'Drainage system',
                                    'waste_management' => 'Waste management',
                                    'street_lighting' => 'Street Lighting',
                                    'parks_public_spaces' => 'Parks & Public spaces',
                                    'sanitation_water_supply_adequate***p' => 'Sanitation and adequate water supply services',
                                    'feel_safe***p' => 'Feel safe',
                                    'environmentally_sustainable***p' => 'Environmentally sustainable'

                                ],
                                'Community Engagement' => [
                                    'attended_meeting_drive_event***p' => 'Organized meetings, drives, or events',
                                    'opinions_considered_dev_plans' => 'Citizen opinions considered on developement plans',
                                    'communication_citizens_municipality' => 'Communication between citizens and the municipality'
                                ],
                            ])
                            ->default('accessibility')
                            ->selectablePlaceholder(false)
                            ->required()
                            ->afterStateUpdated(fn() => redirect(request()->header('Referer'))) // Refresh after selection,
                    ])
                    ->columns(2)
            ]);
    }

    public function getWidgets(): array
    {
        $widgetClass = [
            's' =>  WardCompareStackedChart::class,
            'ns' => WardCompareChart::class
        ];

        $param = $this->filters['param'];
        if (str_contains($param, '***p')) {
            $widget = $widgetClass['s'];
        } else {
            $widget = $widgetClass['ns'];
        }

        return [
            $widget
        ];
    }
}
