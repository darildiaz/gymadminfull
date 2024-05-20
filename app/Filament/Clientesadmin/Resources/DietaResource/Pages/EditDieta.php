<?php

namespace App\Filament\Clientesadmin\Resources\DietaResource\Pages;

use App\Filament\Clientesadmin\Resources\DietaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDieta extends EditRecord
{
    protected static string $resource = DietaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
