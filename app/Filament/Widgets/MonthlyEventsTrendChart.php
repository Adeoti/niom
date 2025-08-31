<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonthlyEventsTrendChart extends ChartWidget
{
    protected ?string $heading = 'Monthly Events Trend';

    protected function getData(): array
    {
        $currentYear = now()->year;
        $driver = DB::getDriverName();
        if ($driver === 'sqlite') {
            $events = Event::selectRaw("CAST(strftime('%m', event_date) AS INTEGER) as month, COUNT(*) as count")
                ->whereRaw("strftime('%Y', event_date || '') = ?", [$currentYear]) // force TEXT
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('count', 'month');
        } else {
            $events = Event::selectRaw('MONTH(event_date) as month, COUNT(*) as count')
                ->whereYear('event_date', $currentYear)
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('count', 'month');
        }


        // dd($events->toArray());


        // Build labels and data for 12 months
        $labels = [];
        $data = [];

        for ($m = 1; $m <= 12; $m++) {
            $labels[] = Carbon::create()->month($m)->format('F');
            $data[] = $events[$m] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Events',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                    'borderColor' => 'rgb(54, 162, 235)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // change to 'line' if you prefer
    }
}
