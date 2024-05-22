<?php

namespace App\Filament\Localadmin\Resources\DatosfacturaResource\Pages;

use App\Filament\Localadmin\Resources\DatosfacturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDatosfactura extends ViewRecord
{
    protected static string $resource = DatosfacturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
