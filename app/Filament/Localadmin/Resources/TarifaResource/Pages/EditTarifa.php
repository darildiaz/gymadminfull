<?php

namespace App\Filament\Localadmin\Resources\TarifaResource\Pages;

use App\Filament\Localadmin\Resources\TarifaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTarifa extends EditRecord
{
    protected static string $resource = TarifaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
