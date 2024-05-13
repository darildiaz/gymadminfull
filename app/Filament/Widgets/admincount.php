<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\card;
use App\Models\actividad;
use App\Models\user;
use App\Models\cliente;
use App\Models\ejercicio;
use App\Models\entrenador;
use App\Models\producto;
use App\Models\suscripcion;
use App\Models\visita;
use App\Models\slider;
use App\Models\gym;
class admincount extends BaseWidget
{
    protected function getStats(): array
    {
        $hoy = now();

        return [
            //card::make('Actividades',actividad::query()->count()),
            card::make('Usuarios',user::query()->count()),
            card::make('Gyms',gym::query()->count()),
            card::make('Usuarios administrativos',user::query()->where('isadmin', true)->count()),
            card::make('Gyms activos',gym::query()->where('habilitado', true)->count()),

            //card::make('Clientes',Cliente::query()->count()),
            //card::make('Entrenadores',entrenador::query()->count()),
            //card::make('Ejercicios',ejercicio::query()->count()),
            //card::make('Productos',producto::query()->count()),
            //card::make('suscripciones',suscripcion::query()->count()),
            card::make('Visitas de Hoy',visita::query()->whereDate('fecha', $hoy)->count()),
            card::make('slider',slider::query()->count()),

        ];
    }
}
