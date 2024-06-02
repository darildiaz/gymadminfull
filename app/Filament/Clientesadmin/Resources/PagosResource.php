<?php

namespace App\Filament\Clientesadmin\Resources;

use App\Filament\Clientesadmin\Resources\PagosResource\Pages;
use App\Filament\Clientesadmin\Resources\PagosResource\RelationManagers;
use App\Models\Pagos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PagosResource extends Resource
{
    protected static ?string $model = Pagos::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->join('clientes', 'clientes.id', '=', 'pagos.clientes_id')
        ->where('clientes.users_id', Auth::user()->id);
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->required(),
                Forms\Components\TextInput::make('actividads_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('clientes_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('gym_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tarifa_id')
                    ->required()
                    ->numeric(),
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
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actividads.Descripcion')
                    ->numeric()
                    ->searchable()

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
              //  Tables\Actions\ViewAction::make(),
            //    Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
             //       Tables\Actions\DeleteBulkAction::make(),
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
            //'create' => Pages\CreatePagos::route('/create'),
          //  'view' => Pages\ViewPagos::route('/{record}'),
          //  'edit' => Pages\EditPagos::route('/{record}/edit'),
        ];
    }
}
