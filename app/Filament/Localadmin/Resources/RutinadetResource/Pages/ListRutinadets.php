<?php

namespace App\Filament\Localadmin\Resources\RutinadetResource\Pages;

use App\Filament\Localadmin\Resources\RutinadetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRutinadets extends ListRecords
{
    protected static string $resource = RutinadetResource::class;

    protected function getHeaderActions(): array
    {
        return [
        //    Actions\CreateAction::make(),
        ];
    }
}
