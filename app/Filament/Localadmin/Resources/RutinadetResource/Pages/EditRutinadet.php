<?php

namespace App\Filament\Localadmin\Resources\RutinadetResource\Pages;

use App\Filament\Localadmin\Resources\RutinadetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRutinadet extends EditRecord
{
    protected static string $resource = RutinadetResource::class;

    protected function getHeaderActions(): array
    {
        return [
       ///     Actions\ViewAction::make(),
        //    Actions\DeleteAction::make(),
        ];
    }
}
