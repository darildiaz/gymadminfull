<?php

namespace App\Filament\Localadmin\Resources\VisitaResource\Pages;

use App\Filament\Localadmin\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisitas extends ListRecords
{
    protected static string $resource = VisitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
