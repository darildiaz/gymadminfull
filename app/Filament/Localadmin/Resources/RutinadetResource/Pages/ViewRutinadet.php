<?php

namespace App\Filament\Localadmin\Resources\RutinadetResource\Pages;

use App\Filament\Localadmin\Resources\RutinadetResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRutinadet extends ViewRecord
{
    protected static string $resource = RutinadetResource::class;

    protected function getHeaderActions(): array
    {
        return [
        //    Actions\EditAction::make(),
        ];
    }
}
