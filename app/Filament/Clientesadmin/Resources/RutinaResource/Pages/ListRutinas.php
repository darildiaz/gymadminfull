<?php

namespace App\Filament\Clientesadmin\Resources\RutinaResource\Pages;

use App\Filament\Clientesadmin\Resources\RutinaResource;
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
