<?php

namespace App\Filament\Clientesadmin\Resources\SuscripcionResource\Pages;

use App\Filament\Clientesadmin\Resources\SuscripcionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSuscripcion extends ViewRecord
{
    protected static string $resource = SuscripcionResource::class;

    protected function getHeaderActions(): array
    {
        return [
         //   Actions\EditAction::make(),
        ];
    }
}
