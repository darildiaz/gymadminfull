<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\CategoriaprodResource\Pages;
use App\Filament\Localadmin\Resources\CategoriaprodResource\RelationManagers;
use App\Models\Categoriaprod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoriaprodResource extends Resource
{
    protected static ?string $model = Categoriaprod::class;
    protected static ?string $navigationGroup = "Ventas";
    protected static ?string $tenantRelationshipName= 'categoriaprods';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
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
            'index' => Pages\ListCategoriaprods::route('/'),
            'create' => Pages\CreateCategoriaprod::route('/create'),
            'view' => Pages\ViewCategoriaprod::route('/{record}'),
            'edit' => Pages\EditCategoriaprod::route('/{record}/edit'),
        ];
    }
}
