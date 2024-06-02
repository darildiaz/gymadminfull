<?php

namespace App\Filament\Clientesadmin\Resources;

use App\Filament\Clientesadmin\Resources\SuscripcionResource\Pages;
use App\Filament\Clientesadmin\Resources\SuscripcionResource\RelationManagers;
use App\Models\Suscripcion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use App\Models\cliente;

use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
class SuscripcionResource extends Resource
{
    protected static ?string $model = Suscripcion::class;
    protected static ?string $tenantRelationshipName= 'suscripcions';

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
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
                Forms\Components\Select::make('actividads_id')
                ->required()
                ->relationship(
                    name: 'actividads',
                    titleAttribute: 'Sescripcion',
                    modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())->where('cupo','>','suscriptos_count'))
                ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->Descripcion} ( {$record->suscriptos_count}/{$record->cupo})")
                
                ->searchable()
                ->preload(),
             /*   Forms\Components\TextInput::make('clientes_id')
                    ->required()
                    ->numeric(),
              */
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actividads.Descripcion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('habilitado')
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
            //    Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                 //   Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSuscripcions::route('/'),
            'create' => Pages\CreateSuscripcion::route('/create'),
            'view' => Pages\ViewSuscripcion::route('/{record}'),
            'edit' => Pages\EditSuscripcion::route('/{record}/edit'),
        ];
    }
}
