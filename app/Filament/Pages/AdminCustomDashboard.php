<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardStatWidget;
use App\Filament\Widgets\MemberRegistrationChart;
use App\Filament\Widgets\MonthlyEventsTrendChart;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class AdminCustomDashboard extends Page
{
    protected string $view = 'filament.pages.admin-custom-dashboard';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Home;
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $title = 'Dashboard';
    protected static ?string $slug = 'Dashboard';


    protected function getHeaderWidgets(): array
    {
        return [
            //
            DashboardStatWidget::class,
            MemberRegistrationChart::class,
            MonthlyEventsTrendChart::class,
        ];
    }
}
