<?php

namespace App\Filament\Localadmin\Resources\VisitaResource\Pages;

use App\Filament\Localadmin\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisita extends EditRecord
{
    protected static string $resource = VisitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
