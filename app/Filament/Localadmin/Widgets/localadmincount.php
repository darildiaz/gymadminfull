<?php

namespace App\Filament\Localadmin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\card;
use App\Models\actividad;
use App\Models\user;
use App\Models\cliente;
use App\Models\ejercicio;
use App\Models\entrenador;
use App\Models\maquina;
use App\Models\producto;
use App\Models\suscripcion;
use App\Models\visita;
use Filament\Facades\Filament;
class localadmincount extends BaseWidget
{
    protected function getStats(): array
    {
        $hoy = now();
        return [
            card::make('Actividades',actividad::query()->whereBelongsTo(Filament::getTenant())->count()),
            card::make('Usuarios',user::query()->whereBelongsTo(Filament::getTenant())->count()),
            card::make('Clientes',Cliente::query()->whereBelongsTo(Filament::getTenant())->count()),
            card::make('Entrenadores',entrenador::query()->whereBelongsTo(Filament::getTenant())->count()),
            card::make('Ejercicios',ejercicio::query()->whereBelongsTo(Filament::getTenant())->count()),
            card::make('Productos',producto::query()->whereBelongsTo(Filament::getTenant())->count()),
            card::make('Maquinas',maquina::query()->whereBelongsTo(Filament::getTenant())->sum('cantidad disponible')),
            card::make('suscripciones',suscripcion::query()->whereBelongsTo(Filament::getTenant())->count()),
            card::make('Visitas de Hoy',visita::query()->whereBelongsTo(Filament::getTenant())->whereDate('fecha', $hoy)->count()),
            
            
        ];
    }
}
