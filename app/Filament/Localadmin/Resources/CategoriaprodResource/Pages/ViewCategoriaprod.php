<?php

namespace App\Filament\Localadmin\Resources\CategoriaprodResource\Pages;

use App\Filament\Localadmin\Resources\CategoriaprodResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoriaprod extends ViewRecord
{
    protected static string $resource = CategoriaprodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
