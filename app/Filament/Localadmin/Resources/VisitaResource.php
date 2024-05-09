<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\VisitaResource\Pages;
use App\Filament\Localadmin\Resources\VisitaResource\RelationManagers;
use App\Models\Visita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;

class VisitaResource extends Resource
{
    protected static ?string $model = Visita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\Select::make('actividads_id')
                ->required()
                ->relationship(
                    name: 'actividads',
                    titleAttribute: 'Descripcion',
                    modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                    ->afterStateUpdated(fn(callable $set ) => ('actividads_id' ))
                ->searchable()
                ->preload()
                ->live(),
                Forms\Components\Select::make('clientes_id')
                    ->required()
                    ->relationship(
                        name: 'suscripcions',
                        titleAttribute: 'clientes.nombre_cliente',
                        modifyQueryUsing: fn (Builder $query,Forms\Get $get) =>
                            $query->where('suscripcions.actividads_id', $get('actividads_id') )->join('clientes', 'clientes.id', '=', 'suscripcions.clientes_id') )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "nombre:{$record->nombre_cliente} apellido: {$record->apellido_cliente}")
                    ->searchable('clientes.nombre_cliente','clientes.apellido_cliente')
                    ->preload(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actividads.Descripcion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.nombre_cliente')
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.apellido_cliente')
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
           //         Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListVisitas::route('/'),
            'create' => Pages\CreateVisita::route('/create'),
            'view' => Pages\ViewVisita::route('/{record}'),
            'edit' => Pages\EditVisita::route('/{record}/edit'),
        ];
    }
}
