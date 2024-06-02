<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\ProductoResource\Pages;
use App\Filament\Localadmin\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;
    protected static ?string $navigationGroup = "Ventas";
    protected static ?string $tenantRelationshipName= 'productos';
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\RichEditor::make('descripcion')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('precio')
                    ->suffix('Gs.')
                    ->numeric(),
                Forms\Components\Select::make('categoriaprods_id')
                    ->required()
                    ->relationship(
                        name: 'categoriaprods',
                        titleAttribute: 'nombre',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                        ->afterStateUpdated(fn(callable $set ) => ('categoriaprods_id'))
                    ->searchable()
                    ->preload()
                    ->live(),
                Forms\Components\Toggle::make('is_visible')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('precio')
                    ->numeric()
                    ->suffix(' Gs.')
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoriaprods.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'view' => Pages\ViewProducto::route('/{record}'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
