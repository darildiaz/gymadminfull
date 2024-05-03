<?php

namespace App\Filament\Localadmin\Resources\ActividadResource\Pages;

use App\Filament\Localadmin\Resources\ActividadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActividad extends EditRecord
{
    protected static string $resource = ActividadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
