<?php

namespace App\Filament\Clientesadmin\Resources\ComidaResource\Pages;

use App\Filament\Clientesadmin\Resources\ComidaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComida extends EditRecord
{
    protected static string $resource = ComidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
          //  Actions\ViewAction::make(),
        //    Actions\DeleteAction::make(),
        ];
    }
}
