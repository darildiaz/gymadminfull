<?php

namespace App\Filament\Localadmin\Resources\EntrenadorResource\Pages;

use App\Filament\Localadmin\Resources\EntrenadorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntrenadors extends ListRecords
{
    protected static string $resource = EntrenadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
