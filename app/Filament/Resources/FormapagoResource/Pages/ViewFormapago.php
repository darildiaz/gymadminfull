<?php

namespace App\Filament\Resources\FormapagoResource\Pages;

use App\Filament\Resources\FormapagoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFormapago extends ViewRecord
{
    protected static string $resource = FormapagoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
