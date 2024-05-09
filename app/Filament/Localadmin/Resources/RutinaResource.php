<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\RutinaResource\Pages;
use App\Filament\Localadmin\Resources\RutinaResource\RelationManagers;
use App\Models\Rutina;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class RutinaResource extends Resource
{
    protected static ?string $model = Rutina::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Gyms";
    protected static ?string $tenantRelationshipName= 'Rutinas';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha_emision')
                    ->required(),

                Forms\Components\Select::make('actividads_id')
                ->required()
                ->relationship(
                    name: 'actividads',
                    titleAttribute: 'Descripcion',
                    modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                ->searchable()
                ->preload(),
                Forms\Components\Select::make('entrenadors_id')
                ->required()
                ->relationship(
                    name: 'entrenadors',
                    titleAttribute: 'nombre_entrenador',
                    modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                ->searchable()
                ->preload(),
                Forms\Components\Select::make('clientes_id')
                    ->required()
                    ->relationship('clientes','nombre_cliente')
                    ->searchable()
                    ->preload(),

                Forms\Components\Repeater::make('rutinadets')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('ejercicios_id')
                ->required()
                ->relationship(
                    name: 'ejercicios',
                    titleAttribute: 'nombre_ejercicio',
                    modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                ->searchable()
                ->preload(),
                Forms\Components\TextInput::make('repeticion')
                ->required()
                ->maxLength(191),
                Forms\Components\TextInput::make('descanso')
                ->required()
                ->maxLength(191),
                        ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha_emision')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actividads.Descripcion')
                    ->sortable(),
                Tables\Columns\TextColumn::make('entrenadors.nombre_entrenador')
                    ->sortable(),
                Tables\Columns\TextColumn::make('entrenadors.apellido_entrenador')
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.nombre_cliente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.apellido_cliente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gym_id')
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
                Tables\Filters\SelectFilter::make('actividads_id')
                ->relationship(
                    name: 'actividads',
                    titleAttribute: 'Descripcion',
                    modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                  //  ->searchable(),
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
            'index' => Pages\ListRutinas::route('/'),
            'create' => Pages\CreateRutina::route('/create'),
            'view' => Pages\ViewRutina::route('/{record}'),
            'edit' => Pages\EditRutina::route('/{record}/edit'),
        ];
    }
}
