<?php

namespace App\Filament\Localadmin\Resources\ClienteResource\Pages;

use App\Filament\Localadmin\Resources\ClienteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCliente extends EditRecord
{
    protected static string $resource = ClienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
