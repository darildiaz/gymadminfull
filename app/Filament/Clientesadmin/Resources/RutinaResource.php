<?php

namespace App\Filament\Clientesadmin\Resources;

use App\Filament\Clientesadmin\Resources\RutinaResource\Pages;
use App\Filament\Clientesadmin\Resources\RutinaResource\RelationManagers;
use App\Models\Rutina;
use App\Models\cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RutinaResource extends Resource
{
    protected static ?string $model = Rutina::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getEloquentQuery(): Builder
    {
        /*return parent::getEloquentQuery()
        ->join('clientes', 'clientes.id', '=', 'Rutinas.clientes_id')
        ->where('clientes.users_id', Auth::user()->id);*/
        $cliente = Cliente::where('users_id', Auth::user()->id)->first();

    // Verificar si se encontró un cliente
        if ($cliente) {
         // Filtrar la consulta por el ID del cliente
            return parent::getEloquentQuery()
                ->where('clientes_id', $cliente->id);
        }
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha_emision')
                    ->required(),
                Forms\Components\TextInput::make('actividads_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('entrenadors_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('clientes_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('gym_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha_emision')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actividads_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('entrenadors_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes_id')
                    ->numeric()
                    ->sortable(),
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
            RelationManagers\RutinadetRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRutinas::route('/'),
            'create' => Pages\CreateRutina::route('/create'),
            'view' => Pages\ViewRutina::route('/{record}'),
            'edit' => Pages\EditRutina::route('/{record}/edit'),
        ];
    }
}
