<?php

namespace App\Filament\Localadmin\Resources\CategoriaprodResource\Pages;

use App\Filament\Localadmin\Resources\CategoriaprodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoriaprods extends ListRecords
{
    protected static string $resource = CategoriaprodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
