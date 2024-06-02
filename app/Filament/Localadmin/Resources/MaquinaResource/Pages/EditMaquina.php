<?php

namespace App\Filament\Localadmin\Resources\MaquinaResource\Pages;

use App\Filament\Localadmin\Resources\MaquinaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaquina extends EditRecord
{
    protected static string $resource = MaquinaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
