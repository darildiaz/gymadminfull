<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\DatosfacturaResource\Pages;
use App\Filament\Localadmin\Resources\DatosfacturaResource\RelationManagers;
use App\Models\Datosfactura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DatosfacturaResource extends Resource
{
    protected static ?string $model = Datosfactura::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "facturacion";
    protected static ?string $tenantRelationshipName= 'datosfacturas';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('timbrado')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codigocontrol')
                    ->required(),
                Forms\Components\DatePicker::make('vigencia')
                    ->required(),
                Forms\Components\DatePicker::make('vencimiento')
                    ->required(),
                Forms\Components\TextInput::make('sucursal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('activo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('timbrado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigocontrol')
                    ->sortable(),
                Tables\Columns\TextColumn::make('vencimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sucursal')
                    ->searchable(),
                Tables\Columns\IconColumn::make('activo')
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
            'index' => Pages\ListDatosfacturas::route('/'),
            'create' => Pages\CreateDatosfactura::route('/create'),
            'view' => Pages\ViewDatosfactura::route('/{record}'),
            'edit' => Pages\EditDatosfactura::route('/{record}/edit'),
        ];
    }
}
