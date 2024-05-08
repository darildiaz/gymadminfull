<?php

namespace App\Filament\Localadmin\Resources\RutinaResource\Pages;

use App\Filament\Localadmin\Resources\RutinaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRutina extends EditRecord
{
    protected static string $resource = RutinaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
