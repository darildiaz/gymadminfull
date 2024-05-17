<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\PagosResource\Pages;
use App\Filament\Localadmin\Resources\PagosResource\RelationManagers;
use App\Models\Pagos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\tarifa;

class PagosResource extends Resource
{
    protected static ?string $model = Pagos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "pagos";
    protected static ?string $tenantRelationshipName= 'pagoss';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->required(),
                Forms\Components\Select::make('actividads_id')
                    ->required()
                    ->relationship(
                        name: 'actividads',
                        titleAttribute: 'Descripcion',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                        ->afterStateUpdated(fn(callable $set ) => ('actividads_id' ))
                    ->searchable()
                    ->preload()
                    ->live(),
                Forms\Components\Select::make('clientes_id')
                    ->required()
                    ->relationship(
                        name: 'suscripcions',
                        titleAttribute: 'clientes.nombre_cliente',
                        modifyQueryUsing: fn (Builder $query,Forms\Get $get) =>
                            $query->where('actividads_id', $get('actividads_id') )->join('clientes', 'clientes.id', '=', 'suscripcions.clientes_id') )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "nombre:{$record->nombre_cliente} apellido: {$record->apellido_cliente}")
                    ->searchable('clientes.nombre_cliente','clientes.apellido_cliente')
                    ->preload(),
                Forms\Components\Select::make('tarifa_id')
                    ->required()
                    ->relationship(
                        name: 'tarifas',
                        titleAttribute: 'tarifas_id',
                        modifyQueryUsing: fn (Builder $query,Forms\Get $get) =>
                        $query->whereBelongsTo(Filament::getTenant())->where('actividads_id', $get('actividads_id') )->orderBy('dias')->orderBy('precio'))
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "dias:{$record->dias} ({$record->precio})Gs")
                    ->searchable(['dias', 'precio'])
                    //->afterStateUpdated(fn ( Model $record, Forms\Set $set) =>  $set('importe', $record->precio) )
                    ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                        $tarifa = tarifa::find($get('tarifa_id'));
                        $set('importe', $tarifa->precio);
                        $set('sesiones', $tarifa->dias);
                    })
                    ->live(onBlur: true)
                    ->preload(),


                Forms\Components\TextInput::make('sesiones')
                    ->required()
                    ->dehydrated()
                    //->disabled()
                    ->numeric()
                    ,
                Forms\Components\TextInput::make('importe')
                    ->required()
                    ->dehydrated()
                    //->disabled()
                    ->suffix('Gs.')
                    ->numeric(),
                    Forms\Components\Section::make()
                ->schema([
                Forms\Components\Repeater::make('movimientos')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('formapagos_id')
                        ->required()
                        ->relationship(
                            name: 'formapagos',
                            titleAttribute: 'nombre'
                            )
                        ->searchable()
                        ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                            $set('gym_id',   Filament::getTenant());
                            })
                        ->preload(),
                        Forms\Components\TextInput::make('importe')
                            ->required()
                            ->numeric(),
                        /*Forms\Components\TextInput::make('gym_id')
                    ->dehydrated()

                            ->required(),
                            //->default($tenant)
                            //->hide(),
*/
                            ])->columns(3)
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actividads.Descripcion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.nombre_cliente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.apellido_cliente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gym.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tarifa_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sesiones')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('importe')
                    ->numeric()
                    ->suffix(' Gs.')

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
            'index' => Pages\ListPagos::route('/'),
            'create' => Pages\CreatePagos::route('/create'),
            'view' => Pages\ViewPagos::route('/{record}'),
            'edit' => Pages\EditPagos::route('/{record}/edit'),
        ];
    }
}
