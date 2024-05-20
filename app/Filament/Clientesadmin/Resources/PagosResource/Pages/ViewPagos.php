<?php

namespace App\Filament\Clientesadmin\Resources\PagosResource\Pages;

use App\Filament\Clientesadmin\Resources\PagosResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPagos extends ViewRecord
{
    protected static string $resource = PagosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
