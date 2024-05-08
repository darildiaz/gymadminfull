<?php

namespace App\Filament\Localadmin\Resources\RutinaResource\Pages;

use App\Filament\Localadmin\Resources\RutinaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRutinas extends ListRecords
{
    protected static string $resource = RutinaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
