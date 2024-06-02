<?php

namespace App\Filament\Localadmin\Widgets;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Facades\Filament;

use Filament\Widgets\ChartWidget;
use App\Models\Visita;
use Illuminate\Support\Carbon;
class visitasChart extends ChartWidget
{
    protected static ?string $heading = 'Visitas del mes';
    public ?string $filter = 'mes';
    protected function getFilters(): ?array
    {
        return [
            'hoy' => 'Hoy',
            'semana' => 'La semana pasada',
            'mes' => 'Último mes',
            'anho' => 'Este año',
        ];
    }


    protected function getData(): array
    {
        $activeFilter = $this->filter;
        $start = now();
        $end = now();
        $interval = 'perDay';

        switch ($activeFilter) {
            case 'hoy':
                $start = now()->startOfDay();
                $end = now()->endOfDay();
                $interval = 'perHour';
                break;

            case 'semana':
                $start = now()->subWeek()->startOfWeek();
                $end = now()->subWeek()->endOfWeek();
                $interval = 'perDay';
                break;

            case 'mes':
                $start = now()->subMonth()->startOfMonth();
                $end = now()->subMonth()->endOfMonth();
                $interval = 'perDay';
                break;

            case 'año':
                $start = now()->startOfYear();
                $end = now()->endOfYear();
                $interval = 'perMonth';
                break;

            default:
                $start = now()->startOfMonth();
                $end = now()->endOfMonth();
                $interval = 'perDay';
                break;
        }

        $data = Trend::query(Visita::whereBelongsTo(Filament::getTenant()))
        //$data = Trend::model(Visita::class)
            
            ->between(
                start: $start,
                end: $end,
            )
            ->$interval()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Visitas',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate)->all(),
                ],
            ],
            'labels' => $data->map(function (TrendValue $value) use ($interval) {
                if ($value->date instanceof \Carbon\Carbon) {
                    switch ($interval) {
                        case 'perHour':
                            return $value->date->format('H:i');
                        case 'perMonth':
                            return $value->date->format('M');
                        default:
                            return $value->date->format('d');
                    }
                }
                return $value->date;
            })->all(),
        ];
    }
    

    protected function getType(): string
    {
        return 'bar';
    }
}
