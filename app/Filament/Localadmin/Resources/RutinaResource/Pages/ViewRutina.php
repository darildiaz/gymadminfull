<?php

namespace App\Filament\Localadmin\Resources\RutinaResource\Pages;

use App\Filament\Localadmin\Resources\RutinaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRutina extends ViewRecord
{
    protected static string $resource = RutinaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
