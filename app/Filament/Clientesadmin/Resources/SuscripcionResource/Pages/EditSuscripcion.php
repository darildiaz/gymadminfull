<?php

namespace App\Filament\Clientesadmin\Resources\SuscripcionResource\Pages;

use App\Filament\Clientesadmin\Resources\SuscripcionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuscripcion extends EditRecord
{
    protected static string $resource = SuscripcionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
           // Actions\DeleteAction::make(),
        ];
    }
}
