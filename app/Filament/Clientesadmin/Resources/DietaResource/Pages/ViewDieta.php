<?php

namespace App\Filament\Clientesadmin\Resources\DietaResource\Pages;

use App\Filament\Clientesadmin\Resources\DietaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDieta extends ViewRecord
{
    protected static string $resource = DietaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
