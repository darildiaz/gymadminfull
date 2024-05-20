<?php

namespace App\Filament\Clientesadmin\Resources;

use App\Filament\Clientesadmin\Resources\ClienteResource\Pages;
use App\Filament\Clientesadmin\Resources\ClienteResource\RelationManagers;
use App\Models\Cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Filament\Facades\Filament;
class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('users_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nombre_cliente')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('apellido_cliente')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefono_emergencia')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Sexo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('peso')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('altura')
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
                Tables\Columns\TextColumn::make('users_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono_emergencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('peso')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('altura')
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
                Filter::make('users_id')->default(Filament::getTenant()->id),
            ])->hiddenFilterIndicators()
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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'view' => Pages\ViewCliente::route('/{record}'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
