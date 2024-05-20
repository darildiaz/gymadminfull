<?php

namespace App\Filament\Localadmin\Resources\DietaResource\Pages;

use App\Filament\Localadmin\Resources\DietaResource;
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
