<?php

namespace App\Filament\Resources\FormapagoResource\Pages;

use App\Filament\Resources\FormapagoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormapago extends EditRecord
{
    protected static string $resource = FormapagoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
