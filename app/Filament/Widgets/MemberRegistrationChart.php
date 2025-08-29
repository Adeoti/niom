<?php

namespace App\Filament\Widgets;


use Filament\Widgets\ChartWidget;
use App\Models\Membership;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemberRegistrationChart extends ChartWidget
{
    protected ?string $heading = 'Member Registration Chart';
    // protected int | string | array $columnSpan = 'full';


    protected function getData(): array
    {
        // Get registration counts per month for the current year
        $currentYear = now()->year;
        $registrations = Membership::selectRaw('MONTH(application_date) as month, COUNT(*) as count')
            ->whereYear('application_date', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $labels = [];
        $data = [];
        for ($m = 1; $m <= 12; $m++) {
            $labels[] = Carbon::create()->month($m)->format('F');
            $data[] = $registrations[$m] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Registrations',
                    'data' => $data,
                    'fill' => true,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgb(75, 192, 192)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
