<?php

namespace App\Filament\Clientesadmin\Resources;

use App\Filament\Clientesadmin\Resources\ComidaResource\Pages;
use App\Filament\Clientesadmin\Resources\ComidaResource\RelationManagers;
use App\Models\Comida;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ComidaResource extends Resource
{
    protected static ?string $model = Comida::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->join('dietadet as dd', 'dd.comidas_id', '=', 'comidas.id')
        ->join('dietas as d', 'd.id', '=', 'dd.dietas_id')
        ->join('clientes as c', 'c.id', '=', 'd.clientes_id')
        ->where('c.users_id', Auth::user()->id) // Especificar explícitamente la columna 'id' de la tabla 'clientes'
        ->select('comidas.*','comidas.id as id'); // Seleccionar solo las columnas necesarias de 'comidas'




        
        
        

        
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('preparacion')
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
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preparacion')
                ->searchable()
                ->html(),
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
            //    Tables\Actions\ViewAction::make(),
             //   Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
              //      Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListComidas::route('/'),
            'create' => Pages\CreateComida::route('/create'),
            'view' => Pages\ViewComida::route('/{record}'),
            'edit' => Pages\EditComida::route('/{record}/edit'),
        ];
    }
}
