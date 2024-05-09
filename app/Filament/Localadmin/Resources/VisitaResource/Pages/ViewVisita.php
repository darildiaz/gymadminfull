<?php

namespace App\Filament\Localadmin\Resources\VisitaResource\Pages;

use App\Filament\Localadmin\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVisita extends ViewRecord
{
    protected static string $resource = VisitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
