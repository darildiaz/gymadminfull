<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\EjercicioResource\Pages;
use App\Filament\Localadmin\Resources\EjercicioResource\RelationManagers;
use App\Models\Ejercicio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EjercicioResource extends Resource
{
    protected static ?string $model = Ejercicio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tipoejercicios_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nombre_ejercicio')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion_ejercicio')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('gym_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipoejercicios_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_ejercicio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gym_id')
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
            'index' => Pages\ListEjercicios::route('/'),
            'create' => Pages\CreateEjercicio::route('/create'),
            'view' => Pages\ViewEjercicio::route('/{record}'),
            'edit' => Pages\EditEjercicio::route('/{record}/edit'),
        ];
    }
}
