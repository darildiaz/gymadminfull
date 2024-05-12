<?php

namespace App\Filament\Localadmin\Resources\CategoriaprodResource\Pages;

use App\Filament\Localadmin\Resources\CategoriaprodResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoriaprod extends EditRecord
{
    protected static string $resource = CategoriaprodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
