<?php

namespace App\Filament\Localadmin\Resources\DietaResource\Pages;

use App\Filament\Localadmin\Resources\DietaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDietas extends ListRecords
{
    protected static string $resource = DietaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
