<?php

namespace App\Filament\Resources\GymResource\Pages;

use App\Filament\Resources\GymResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGym extends ViewRecord
{
    protected static string $resource = GymResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
