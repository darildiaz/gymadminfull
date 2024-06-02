<?php

namespace App\Filament\Localadmin\Resources\MaquinaResource\Pages;

use App\Filament\Localadmin\Resources\MaquinaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaquinas extends ListRecords
{
    protected static string $resource = MaquinaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
