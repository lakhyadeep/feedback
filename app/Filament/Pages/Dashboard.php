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

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [];
    }
}
