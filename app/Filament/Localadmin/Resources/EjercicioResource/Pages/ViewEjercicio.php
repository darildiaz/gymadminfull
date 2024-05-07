<?php

namespace App\Filament\Localadmin\Resources\EjercicioResource\Pages;

use App\Filament\Localadmin\Resources\EjercicioResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEjercicio extends ViewRecord
{
    protected static string $resource = EjercicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
