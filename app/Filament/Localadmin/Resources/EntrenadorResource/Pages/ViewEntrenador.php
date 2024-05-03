<?php

namespace App\Filament\Localadmin\Resources\EntrenadorResource\Pages;

use App\Filament\Localadmin\Resources\EntrenadorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEntrenador extends ViewRecord
{
    protected static string $resource = EntrenadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
