<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\FacturaResource\Pages;
use App\Filament\Localadmin\Resources\FacturaResource\RelationManagers;
use App\Models\Factura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class FacturaResource extends Resource
{
    protected static ?string $model = Factura::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('datosfacturas_id')
                    ->required()
                    ->relationship(
                        name: 'datosfacturas',
                        titleAttribute: 'timbrado',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())->where('activo',true))
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('sucursal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nfactura')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('valorFactura')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('valorImpuesto')
                    ->required()
                    ->numeric(),
                    Forms\Components\Section::make()
                    ->schema([
                    Forms\Components\Repeater::make('facturadets')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('productos_id')
                            ->required()
                            ->relationship(
                                name: 'productos',
                                titleAttribute: 'nombre',
                                modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                            ->searchable()
                            ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                               // $producto = producto::find($get('productos_id'));
                                //$set('precio', $producto->precio);
                                //self::updateLineTotal($get, $set);

                            })
                            ->live(onBlur: true)
                            ->preload(),
                        Forms\Components\TextInput::make('cantidad')
                            ->required()
                            ->default(1)
                            ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                              //  self::updateLineTotal($get, $set);
                             //   $set('subtotal', $get('cantidad')*$get('precio'));
                            })
                            ->live(onBlur: true)
                            ->numeric(),
                        Forms\Components\TextInput::make('precio')
                            ->default(0)
                        ->live(onBlur: true)

                      //      ->disabled()
                            ->suffix('Gs.')
                            ->maxLength(191),

                ])
                ->live(onBlur: true)

                ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                  //  $set('subtotal', $get('cantidad')*$get('precio'));
                    //$set('total', 1000);
                    //self::updateTotals( $get, $set);
				    //self::updateLineTotal($get, $set);
                })
                ->columns(3),
                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sucursal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nfactura')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valorFactura')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valorImpuesto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datosfacturas_id')
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
            'index' => Pages\ListFacturas::route('/'),
            'create' => Pages\CreateFactura::route('/create'),
            'view' => Pages\ViewFactura::route('/{record}'),
            'edit' => Pages\EditFactura::route('/{record}/edit'),
        ];
    }
}
