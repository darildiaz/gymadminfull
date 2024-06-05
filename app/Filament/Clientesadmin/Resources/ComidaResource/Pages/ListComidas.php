<?php

namespace App\Filament\Clientesadmin\Resources\ComidaResource\Pages;

use App\Filament\Clientesadmin\Resources\ComidaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComidas extends ListRecords
{
    protected static string $resource = ComidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
