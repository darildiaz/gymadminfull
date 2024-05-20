<?php

namespace App\Filament\Clientesadmin\Resources\PagosResource\Pages;

use App\Filament\Clientesadmin\Resources\PagosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPagos extends EditRecord
{
    protected static string $resource = PagosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
