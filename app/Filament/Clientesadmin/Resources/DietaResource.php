<?php

namespace App\Filament\Clientesadmin\Resources;

use App\Filament\Clientesadmin\Resources\DietaResource\Pages;
use App\Filament\Clientesadmin\Resources\DietaResource\RelationManagers;
use App\Models\Dieta;
use App\Models\Cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\entrenador;
class DietaResource extends Resource
{
    protected static ?string $model = Dieta::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
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
                Forms\Components\DatePicker::make('fecha')
                ->required(),
            Forms\Components\TextInput::make('dias')
                ->required()
                ->numeric(),
            Forms\Components\Select::make('clientes_id')
                ->required()
                ->relationship(
                    name: 'clientes',
                    titleAttribute: 'nombre',
                    modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                    ->afterStateUpdated(fn(callable $set ) => ('clientes_id'))
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "nombre:{$record->nombre_cliente} apellido: {$record->apellido_cliente}")
                    ->searchable('clientes.nombre_cliente','clientes.apellido_cliente')
                ->preload()
                ->live(),
            Forms\Components\Select::make('entrenadors_id')
                ->required()
                ->relationship(
                    name: 'entrenadors',
                    titleAttribute: 'nombre',
                    modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                    ->afterStateUpdated(fn(callable $set ) => ('entrenadors_id'))
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "nombre:{$record->nombre_entrenador} apellido: {$record->apellido_entrenador}")
                    ->searchable('entrenadors.nombre_entrenador','entrenadors.apellido_entrenador')
                ->preload()
                ->live(),
            

                Forms\Components\Repeater::make('dietadets')
                ->relationship()
                ->schema([
                    Forms\Components\TimePicker::make('horario')
                        ->required(),
                    Forms\Components\Select::make('comidas_id')
                        ->required() 
                        ->relationship(
                            name: 'comidas',
                            titleAttribute: 'nombre',
                            modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                            //->afterStateUpdated(fn(callable $set ) => ('cs_id'))
                        ->searchable()
                        ->preload()
                        ->live(),
                
                    Forms\Components\TextInput::make('cantidad')
                        ->default(1)
                    ->live(onBlur: true)

                  //      ->disabled()
                        ->suffix('Gs.')
                        ->maxLength(191),
                    
            ])
            ->live(onBlur: true)
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dias')
                    ->numeric()
                    ->sortable(),
                /*Tables\Columns\TextColumn::make('clientes_id')
                    ->numeric()
                    ->sortable(),*/
                Tables\Columns\TextColumn::make('entrenadors.nombre_entrenador')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('entrenadors.apellido_entrenador')
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
              //  Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                //    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDietas::route('/'),
            'create' => Pages\CreateDieta::route('/create'),
            'view' => Pages\ViewDieta::route('/{record}'),
            'edit' => Pages\EditDieta::route('/{record}/edit'),
        ];
    }
}
