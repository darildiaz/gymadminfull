<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\SuscripcionResource\Pages;
use App\Filament\Localadmin\Resources\SuscripcionResource\RelationManagers;
use App\Models\Suscripcion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\cliente;
class SuscripcionResource extends Resource
{
    protected static ?string $model = Suscripcion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Clientes";
    protected static ?string $tenantRelationshipName= 'suscripcions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('actividads_id')
                    ->required()
                    ->relationship(
                        name: 'actividads',
                        titleAttribute: 'Sescripcion',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())->where('cupo','>','suscriptos_count'))
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->Descripcion} ( {$record->suscriptos_count}/{$record->cupo})")
                    
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('clientes_id')
                    ->required()
                    ->relationship(
                        name: 'clientes',
                        titleAttribute: 'nombre',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                        ->afterStateUpdated(fn(callable $set ) => ('clientes_id'))
                        ->getOptionLabelFromRecordUsing(fn (Model $record) => "nombre:{$record->nombre_cliente} apellido: {$record->apellido_cliente}")
                        ->searchable('clientes.nombre_cliente','clientes.apellido_cliente')
                    ->preload()
                    ->live(),
/*
                Forms\Components\Toggle::make('habilitado')
                    ->required(),*/
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actividads.Descripcion')
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.nombre_cliente')
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.apellido_cliente')
                    ->sortable(),

                Tables\Columns\TextColumn::make('gym.name')
                    ->sortable(),
                Tables\Columns\IconColumn::make('habilitado')
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
            'index' => Pages\ListSuscripcions::route('/'),
            'create' => Pages\CreateSuscripcion::route('/create'),
            'view' => Pages\ViewSuscripcion::route('/{record}'),
            'edit' => Pages\EditSuscripcion::route('/{record}/edit'),
        ];
    }
}
