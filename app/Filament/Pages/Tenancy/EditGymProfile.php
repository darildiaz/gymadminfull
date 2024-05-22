<?php
namespace App\Filament\Pages\Tenancy;

use App\Models\Gym;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;

//use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditGymProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Editar gym';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('latitud')
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                         $set('location', [
                             'lat' => floatVal($get('latitud')),
                             'lng' => floatVal($get('longitud')),
                         ]);
                     })
                     ->reactive()
                     ->lazy(),
     
                 Forms\Components\TextInput::make('longitud')
                     ->reactive()
                     ->afterStateUpdated(function ($state, callable $get, callable $set) {
                         $set('location', [
                             'lat' => floatval($get('latitud')),
                             'lng' => floatVal($get('longitud')),
                         ]);
                     })
     
                     ->lazy(),
     
                 Map::make('location')
                -> defaultLocation([ 'latitud','longitud'])
                     ->reactive()
                     ->live(onBlur: true)

                     ->afterStateUpdated(function ($state, callable $get, callable $set) {
                         $set('latitud', $state['lat']);
                         $set('longitud', $state['lng']);
                     })->drawingControl()
                     ->lazy()
                     ->defaultLocation(function ($record) {
                         if ($record) {
                             return [$record->latitud, $record->longitud];
                         }
                         return [-23.3998500, -57.4323600]; // Puedes reemplazar esto con una ubicación por defecto si lo prefieres
                     })
                     ->mapControls([
                         'zoomControl' => true,
                     ])
                     ->debug()
                     ->clickable()
                     ->autocompleteReverse()
                     ->reverseGeocode([
                         'city'   => '%L',
                         'zip'    => '%z',
                         'state'  => '%A1',
                         'street' => '%n %S',
                     ])
                     ->geolocate()
                     ->columnSpan(2),
                Forms\Components\RichEditor::make('descripcion')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('imagen')
                ->required()
                ->image(),
                Forms\Components\Select::make('categorias_id')
                    ->required()
                    ->relationship('categorias','nombre')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('ruc')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('razonsocial')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('servicios')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Repeater::make('gym_user')
                    ->relationship()
                    ->schema([
                    Forms\Components\Select::make('user_id')
                        ->required()
                        ->relationship(
                            name: 'users',
                            titleAttribute: 'name',
                            )
                        ->searchable()
                        ->preload(),
                    ])
                       ]);
    }

    protected function handleRegistration(array $data): Gym
    {
        $team = Gym::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
