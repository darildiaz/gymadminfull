<?php

namespace App\Filament\Localadmin\Resources\MovimientoResource\Pages;

use App\Filament\Localadmin\Resources\MovimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMovimiento extends EditRecord
{
    protected static string $resource = MovimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
