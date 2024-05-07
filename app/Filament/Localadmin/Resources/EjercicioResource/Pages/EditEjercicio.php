<?php

namespace App\Filament\Localadmin\Resources\EjercicioResource\Pages;

use App\Filament\Localadmin\Resources\EjercicioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEjercicio extends EditRecord
{
    protected static string $resource = EjercicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
