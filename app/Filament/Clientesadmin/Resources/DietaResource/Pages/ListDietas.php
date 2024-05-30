<?php

namespace App\Filament\Clientesadmin\Resources\DietaResource\Pages;

use App\Filament\Clientesadmin\Resources\DietaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDietas extends ListRecords
{
    protected static string $resource = DietaResource::class;

    protected function getHeaderActions(): array
    {
        return [
         //   Actions\CreateAction::make(),
        ];
    }
}
