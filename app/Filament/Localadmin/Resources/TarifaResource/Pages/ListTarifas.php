<?php

namespace App\Filament\Localadmin\Resources\TarifaResource\Pages;

use App\Filament\Localadmin\Resources\TarifaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTarifas extends ListRecords
{
    protected static string $resource = TarifaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
