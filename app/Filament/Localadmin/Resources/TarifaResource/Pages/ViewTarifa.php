<?php

namespace App\Filament\Localadmin\Resources\TarifaResource\Pages;

use App\Filament\Localadmin\Resources\TarifaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTarifa extends ViewRecord
{
    protected static string $resource = TarifaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
