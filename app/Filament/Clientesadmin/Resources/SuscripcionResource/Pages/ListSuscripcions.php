<?php

namespace App\Filament\Clientesadmin\Resources\SuscripcionResource\Pages;

use App\Filament\Clientesadmin\Resources\SuscripcionResource;
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
