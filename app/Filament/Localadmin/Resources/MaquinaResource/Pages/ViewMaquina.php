<?php

namespace App\Filament\Localadmin\Resources\MaquinaResource\Pages;

use App\Filament\Localadmin\Resources\MaquinaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMaquina extends ViewRecord
{
    protected static string $resource = MaquinaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
