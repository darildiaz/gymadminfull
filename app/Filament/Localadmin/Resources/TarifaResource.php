<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\TarifaResource\Pages;
use App\Filament\Localadmin\Resources\TarifaResource\RelationManagers;
use App\Models\Tarifa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TarifaResource extends Resource
{
    protected static ?string $model = Tarifa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "pagos";
    protected static ?string $tenantRelationshipName= 'tarifas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('actividads_id')
                    ->required()
                    ->relationship('actividads','descripcion')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('dias')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('precio')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actividads.Descripcion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dias')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('precio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gym.name')
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
            'index' => Pages\ListTarifas::route('/'),
            'create' => Pages\CreateTarifa::route('/create'),
            'view' => Pages\ViewTarifa::route('/{record}'),
            'edit' => Pages\EditTarifa::route('/{record}/edit'),
        ];
    }
}
