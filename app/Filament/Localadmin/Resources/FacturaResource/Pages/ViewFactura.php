<?php

namespace App\Filament\Localadmin\Resources\FacturaResource\Pages;

use App\Filament\Localadmin\Resources\FacturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFactura extends ViewRecord
{
    protected static string $resource = FacturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\EditAction::make(),
            Actions\Action::make('generar factura'),
        ];
    }
}
