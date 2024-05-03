<?php

namespace App\Filament\Resources\TipoejercicioResource\Pages;

use App\Filament\Resources\TipoejercicioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipoejercicio extends EditRecord
{
    protected static string $resource = TipoejercicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
