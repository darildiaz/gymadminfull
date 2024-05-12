<?php

namespace App\Filament\Localadmin\Resources\MovimientoResource\Pages;

use App\Filament\Localadmin\Resources\MovimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMovimiento extends ViewRecord
{
    protected static string $resource = MovimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
