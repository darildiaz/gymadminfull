<?php

namespace App\Filament\Localadmin\Resources\SuscripcionResource\Pages;

use App\Filament\Localadmin\Resources\SuscripcionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuscripcions extends ListRecords
{
    protected static string $resource = SuscripcionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
