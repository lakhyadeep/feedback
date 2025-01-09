<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\WardCompareChart;
use Filament\Forms\Form;
use Filament\Facades\Filament;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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
                                    'responsiveness_grievances***f' => 'responsiveness_grievances',
                                    'proactive_step_issues***f' => 'proactive_step_issues',
                                    'transparent_action_and_decision***p' => 'transparent_action_and_decision'
                                ],
                                'Development & Infrastructure' => [
                                    'roads_pavements' => 'roads_pavements',
                                    'drainage_system' => 'drainage_system',
                                    'waste_management' => 'waste_management',
                                    'street_lighting' => 'street_lighting',
                                    'parks_public_spaces' => 'parks_public_spaces',
                                    'sanitation_water_supply_adequate***p' => 'sanitation_water_supply_adequate',
                                    'feel_safe***p' => 'feel_safe',
                                    'environmentally_sustainable***p' => 'environmentally_sustainable'

                                ],
                                'Community Engagement' => [
                                    'attended_meeting_drive_event***p' => 'attended_meeting_drive_event',
                                    'opinions_considered_dev_plans' => 'opinions_considered_dev_plans',
                                    'communication_citizens_municipality' => 'communication_citizens_municipality'
                                ],
                            ])
                            ->default('accessibility')
                            ->loadingMessage('Loading authors...')
                            ->selectablePlaceholder(false)
                            ->required(),
                    ])
                    ->columns(2)
            ]);
    }

    public function getWidgets(): array
    {
        return [
            WardCompareChart::class
        ];
    }
}
