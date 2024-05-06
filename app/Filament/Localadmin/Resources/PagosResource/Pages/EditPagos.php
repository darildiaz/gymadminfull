<?php

namespace App\Filament\Localadmin\Resources\PagosResource\Pages;

use App\Filament\Localadmin\Resources\PagosResource;
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
