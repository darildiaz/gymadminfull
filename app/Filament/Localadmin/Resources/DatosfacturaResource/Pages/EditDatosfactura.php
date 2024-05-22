<?php

namespace App\Filament\Localadmin\Resources\DatosfacturaResource\Pages;

use App\Filament\Localadmin\Resources\DatosfacturaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDatosfactura extends EditRecord
{
    protected static string $resource = DatosfacturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
