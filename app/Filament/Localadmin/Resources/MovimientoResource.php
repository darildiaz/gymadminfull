<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\MovimientoResource\Pages;
use App\Filament\Localadmin\Resources\MovimientoResource\RelationManagers;
use App\Models\Movimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovimientoResource extends Resource
{
    protected static ?string $model = Movimiento::class;
    protected static ?string $navigationGroup = "pagos";
    protected static ?string $tenantRelationshipName= 'movimientos';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('venta_id')
                //    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pagoss_id')
                 //   ->required()
                    ->numeric(),
                    Forms\Components\Select::make('formapagos_id')
                    ->required()
                    ->relationship(
                        name: 'formapagos',
                        titleAttribute: 'nombre'
                        )
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('importe')
                ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('venta_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pagoss_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('formapagos.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('importe')
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
            'index' => Pages\ListMovimientos::route('/'),
            'create' => Pages\CreateMovimiento::route('/create'),
            'view' => Pages\ViewMovimiento::route('/{record}'),
            'edit' => Pages\EditMovimiento::route('/{record}/edit'),
        ];
    }
}
