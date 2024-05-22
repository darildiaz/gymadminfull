<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GymResource\Pages;
use App\Filament\Resources\GymResource\RelationManagers;
use App\Models\Gym;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;

class GymResource extends Resource
{
    protected static ?string $model = Gym::class;
    protected static ?string $navigationGroup = "Gyms";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
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
                     ->live(onBlur: true)
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
                     ->live(onBlur: true)
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
                    ->live(onBlur: true)

                    ->maxLength(65535)
                    ->columnSpanFull(),
                    Forms\Components\Toggle::make('habilitado'),
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
                    //->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('longitud')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('latitud')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categorias.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGyms::route('/'),
            'create' => Pages\CreateGym::route('/create'),
            'view' => Pages\ViewGym::route('/{record}'),
            'edit' => Pages\EditGym::route('/{record}/edit'),
        ];
    }
}
