<?php

namespace App\Filament\Clientesadmin\Resources\SuscripcionResource\Pages;

use App\Filament\Clientesadmin\Resources\SuscripcionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\cliente;
use Illuminate\Support\Facades\Auth;

class CreateSuscripcion extends CreateRecord
{
    protected static string $resource = SuscripcionResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $cliente = Cliente::where('users_id', Auth::user()->id)->first();
    
    $data['clientes_id'] = $cliente->id;
 
    return $data;
}
}
