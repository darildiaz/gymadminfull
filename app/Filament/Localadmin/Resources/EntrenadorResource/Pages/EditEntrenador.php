<?php

namespace App\Filament\Localadmin\Resources\EntrenadorResource\Pages;

use App\Filament\Localadmin\Resources\EntrenadorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEntrenador extends EditRecord
{
    protected static string $resource = EntrenadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
