<?php

namespace App\Filament\Localadmin\Resources\VentaResource\Pages;

use App\Filament\Localadmin\Resources\VentaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVenta extends ViewRecord
{
    protected static string $resource = VentaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
