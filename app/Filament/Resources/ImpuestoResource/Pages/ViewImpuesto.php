<?php

namespace App\Filament\Resources\ImpuestoResource\Pages;

use App\Filament\Resources\ImpuestoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewImpuesto extends ViewRecord
{
    protected static string $resource = ImpuestoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
