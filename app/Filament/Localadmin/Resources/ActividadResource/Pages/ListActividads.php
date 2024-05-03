<?php

namespace App\Filament\Localadmin\Resources\ActividadResource\Pages;

use App\Filament\Localadmin\Resources\ActividadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActividads extends ListRecords
{
    protected static string $resource = ActividadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
