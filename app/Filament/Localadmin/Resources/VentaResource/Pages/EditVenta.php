<?php

namespace App\Filament\Localadmin\Resources\VentaResource\Pages;

use App\Filament\Localadmin\Resources\VentaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVenta extends EditRecord
{
    protected static string $resource = VentaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
