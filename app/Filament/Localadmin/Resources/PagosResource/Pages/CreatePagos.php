<?php

namespace App\Filament\Localadmin\Resources\PagosResource\Pages;

use App\Filament\Localadmin\Resources\PagosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\suscripcion;

class CreatePagos extends CreateRecord
{
    protected static string $resource = PagosResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Suponiendo que 'suscripcion_id' está en los datos del formulario
        $clientesId = $data['clientes_id'];
        $actividadsId = $data['actividads_id'];
        
        // Buscar la suscripción correspondiente
        $suscripcion = Suscripcion::where('clientes_id', $clientesId)
                                  ->where('actividads_id', $actividadsId)
                                  ->first();

        // Cambiar el estado de la suscripción a habilitado si se encuentra
        if ($suscripcion) {
            $suscripcion->habilitado = 1;
            $suscripcion->save();
        }
        
        return $data;
    }
}
