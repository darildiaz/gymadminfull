<?php

namespace App\Filament\Localadmin\Resources\ProductoResource\Pages;

use App\Filament\Localadmin\Resources\ProductoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProducto extends EditRecord
{
    protected static string $resource = ProductoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
