<?php

namespace App\Filament\Resources\TipoejercicioResource\Pages;

use App\Filament\Resources\TipoejercicioResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTipoejercicio extends ViewRecord
{
    protected static string $resource = TipoejercicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
