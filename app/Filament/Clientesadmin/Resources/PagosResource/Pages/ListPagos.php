<?php

namespace App\Filament\Clientesadmin\Resources\PagosResource\Pages;

use App\Filament\Clientesadmin\Resources\PagosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPagos extends ListRecords
{
    protected static string $resource = PagosResource::class;

    protected function getHeaderActions(): array
    {
        return [
     //       Actions\CreateAction::make(),
        ];
    }
}
