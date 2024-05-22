<?php

namespace App\Filament\Localadmin\Resources\DatosfacturaResource\Pages;

use App\Filament\Localadmin\Resources\DatosfacturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDatosfacturas extends ListRecords
{
    protected static string $resource = DatosfacturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
