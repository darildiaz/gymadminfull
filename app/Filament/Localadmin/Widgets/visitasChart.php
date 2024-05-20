<?php

namespace App\Filament\Localadmin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\visita;

class visitasChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
