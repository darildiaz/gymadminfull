<?php

namespace App\Filament\Resources\TipoejercicioResource\Pages;

use App\Filament\Resources\TipoejercicioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoejercicios extends ListRecords
{
    protected static string $resource = TipoejercicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
