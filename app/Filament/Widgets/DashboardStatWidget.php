<?php

namespace App\Filament\Widgets;

use App\Models\Membership;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        //
        $stats = [
            'total' => Membership::count(),
            'approved' => Membership::where('status', 'approved')->count(),
            'pending' => Membership::where('status', 'pending')->count(),
        ];
        return [
            //
            Stat::make('Total Members', $stats['total'])
                ->color('primary')
                ->icon('heroicon-o-users'),
            Stat::make('Approved Members', $stats['approved'])
                ->color('success')
                ->icon('heroicon-o-check-circle'),
            Stat::make('Pending Applications', $stats['pending'])
                ->color('warning')
                ->icon('heroicon-o-clock'),
        ];
    }
}
