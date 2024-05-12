<?php

namespace App\Filament\Resources\FormapagoResource\Pages;

use App\Filament\Resources\FormapagoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormapagos extends ListRecords
{
    protected static string $resource = FormapagoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
