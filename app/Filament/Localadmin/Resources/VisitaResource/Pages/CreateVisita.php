<?php

namespace App\Filament\Localadmin\Resources\VisitaResource\Pages;

use App\Filament\Localadmin\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\pagos;
use App\Models\visita;
use App\Models\suscripcion;

class CreateVisita extends CreateRecord
{
    protected static string $resource = VisitaResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Suponiendo que 'suscripcion_id' está en los datos del formulario
        $clientesId = $data['clientes_id'];
        $actividadsId = $data['actividads_id'];
        //$vistacan= 0;
        
        $visitacan= visita::where('clientes_id', $clientesId)
        ->where('actividads_id', $actividadsId)
        ->count();
        // Buscar la suscripción correspondiente
        $pagos = pagos::where('clientes_id', $clientesId)
                                  ->where('actividads_id', $actividadsId)
                                  ->where('valido',true)
                                  ->first();
        if ($pagos){
            $pagossession=$pagos->sesiones;
            // Cambiar el estado de la suscripción a habilitado si se encuentra
            if (($visitacan+1)>=$pagossession) {
            
            // Buscar la suscripción correspondiente
                $suscripcion = Suscripcion::where('clientes_id', $clientesId)
                                    ->where('actividads_id', $actividadsId)
                                    ->first();

            // Cambiar el estado de la suscripción a habilitado si se encuentra
                if ($suscripcion) {
                    $suscripcion->habilitado = 0;
                    $suscripcion->save();
                    $pagos->valido=0;
                    $pagos->save();

                }
            }
        }
        return $data;
    }
}
