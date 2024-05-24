<?php

namespace App\Filament\Localadmin\Resources\ActividadResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\cliente;
class SuscripcionRelationManager extends RelationManager
{
    protected static string $relationship = 'suscripcions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('clientes')
            ->columns([
                Tables\Columns\TextColumn::make('clientes.nombre_cliente','nombre'),
                Tables\Columns\TextColumn::make('clientes.apellido_cliente','apellido'),
                Tables\Columns\IconColumn::make('habilitado')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
