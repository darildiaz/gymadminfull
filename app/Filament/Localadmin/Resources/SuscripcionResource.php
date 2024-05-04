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
                    ->relationship('actividads','descripcion')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('clientes_id')
                    ->required()
                    ->relationship('clientes','nombre_cliente')
                    ->searchable()
                    ->preload(),

                Forms\Components\Toggle::make('habilitado')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actividads_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gym_id')
                    ->numeric()
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
