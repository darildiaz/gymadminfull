<?php

namespace App\Filament\Localadmin\Resources\ComidaResource\Pages;

use App\Filament\Localadmin\Resources\ComidaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewComida extends ViewRecord
{
    protected static string $resource = ComidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
