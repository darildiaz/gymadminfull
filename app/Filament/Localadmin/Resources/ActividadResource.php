<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\ActividadResource\Pages;
use App\Filament\Localadmin\Resources\ActividadResource\RelationManagers;
use App\Models\Actividad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActividadResource extends Resource
{
    protected static ?string $model = Actividad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
//    protected static ?string $navigationLabel = "Actividades";
    protected static ?string $navigationGroup = "Gyms";
    protected static ?string $tenantRelationshipName= 'actividads';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Descripcion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cupo')
                    ->required()
                    ->numeric(),
                Forms\Components\TimePicker::make('horario')
                    ->required(),
                Forms\Components\Toggle::make('lunes')
                    ->required(),
                Forms\Components\Toggle::make('martes')
                    ->required(),
                Forms\Components\Toggle::make('miercoles')
                    ->required(),
                Forms\Components\Toggle::make('jueves')
                    ->required(),
                Forms\Components\Toggle::make('vienes')
                    ->required(),
                Forms\Components\Toggle::make('sabado')
                    ->required(),
                Forms\Components\Toggle::make('domingo')
                    ->required(),
                Forms\Components\Repeater::make('Actividadentrenador')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('entrenador_id')
                            ->required()
                            ->relationship(
                                name: 'entrenadors',
                                titleAttribute: 'nombre_entrenador',
                                )
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gym.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Descripcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cupo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horario'),
                Tables\Columns\IconColumn::make('lunes')
                    ->boolean(),
                Tables\Columns\IconColumn::make('martes')
                    ->boolean(),
                Tables\Columns\IconColumn::make('miercoles')
                    ->boolean(),
                Tables\Columns\IconColumn::make('jueves')
                    ->boolean(),
                Tables\Columns\IconColumn::make('vienes')
                    ->boolean(),
                Tables\Columns\IconColumn::make('sabado')
                    ->boolean(),
                Tables\Columns\IconColumn::make('domingo')
                    ->boolean(),
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
                Tables\Actions\Action::make("inscribir")
                ->form([
                    Forms\Components\Repeater::make('suscripcions')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('clientes_id')
                            ->required()
                            ->relationship(
                                name: 'clientes',
                                titleAttribute: 'nombre_cliente',
                                )
                            ->searchable()
                            ->preload(),
                    ]),
                ]),
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
            'index' => Pages\ListActividads::route('/'),
            'create' => Pages\CreateActividad::route('/create'),
            'view' => Pages\ViewActividad::route('/{record}'),
            'edit' => Pages\EditActividad::route('/{record}/edit'),
        ];
    }
}
