<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\PagosResource\Pages;
use App\Filament\Localadmin\Resources\PagosResource\RelationManagers;
use App\Models\Pagos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PagosResource extends Resource
{
    protected static ?string $model = Pagos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "pagos";
    protected static ?string $tenantRelationshipName= 'pagoss';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->required(),
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
                    Forms\Components\Select::make('tarifa_id')
                    ->required()
                    ->relationship('tarifas','dias')
                    ->searchable()
                    ->preload(),

                Forms\Components\TextInput::make('sesiones')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('importe')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actividads_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gym_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tarifa_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sesiones')
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
            'index' => Pages\ListPagos::route('/'),
            'create' => Pages\CreatePagos::route('/create'),
            'view' => Pages\ViewPagos::route('/{record}'),
            'edit' => Pages\EditPagos::route('/{record}/edit'),
        ];
    }
}
