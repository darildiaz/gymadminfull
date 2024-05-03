<?php

namespace App\Filament\Localadmin\Resources\ClienteResource\Pages;

use App\Filament\Localadmin\Resources\ClienteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCliente extends ViewRecord
{
    protected static string $resource = ClienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
