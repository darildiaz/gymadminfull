<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\VentaResource\Pages;
use App\Filament\Localadmin\Resources\VentaResource\RelationManagers;
use App\Models\Venta;
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
use App\Models\cliente;
use App\Models\producto;
//use Filament\Tables\Actions\CreateAction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
class VentaResource extends Resource
{
    protected static ?string $model = Venta::class;
    protected static ?string $navigationGroup = "Ventas";
    protected static ?string $tenantRelationshipName= 'ventas';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make()
                ->schema([
                    Forms\Components\DatePicker::make('fecha')
                    //->readonly()
                    ->default(now())
                    ->required(),
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
                ])->columns(2),
                Forms\Components\Section::make()
                    ->schema([
                    Forms\Components\Repeater::make('ventadets')
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
                                $producto = producto::find($get('productos_id'));
                                $set('precio', $producto->precio);
                                self::updateLineTotal($get, $set);

                            })
                            ->live(onBlur: true)
                            ->preload(),
                        Forms\Components\TextInput::make('cantidad')
                            ->required()
                            ->default(1)
                            ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                                self::updateLineTotal($get, $set);
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
                    self::updateTotals( $get, $set);
				    //self::updateLineTotal($get, $set);
                })
                ->columns(3),
                ])->columns(1),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('descuento')
                            ->default(0)
                            ->suffix('%')

                            ->live(onBlur: true)
                            ->numeric()
                            ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                                //  $set('subtotal', $get('cantidad')*$get('precio'));
                                  //$set('total', 1000);
                                  self::updateTotals( $get, $set);
                                  //self::updateLineTotal($get, $set);
                              }),
                        Forms\Components\TextInput::make('total')
                            //->disabled()
                            ->suffix('Gs.')
                            ->disabled()

                            ->numeric(),
                            Forms\Components\TextInput::make('totalpagado')
                            ->required()
                            ->disabled()

                            ->numeric(),
                ])->columns(2),
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
                        ->preload(),
                        Forms\Components\TextInput::make('importe')
                            ->required()
                            ->numeric(),
                        Forms\Components\Hidden::make('gym_id')
                            ->default(Filament::getTenant()->id),
                        /*Forms\Components\TextInput::make('')
                            ->required()
                            ->default(1)
                            ->disabled(),
*/
                            ])->columns(3)
                    ])->columns(1)->live(onBlur: true)

                    ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                      //  $set('subtotal', $get('cantidad')*$get('precio'));
                        //$set('total', 1000);
                        self::updatepagos( $get, $set);

                        self::updateTotals( $get, $set);
                        //self::updateLineTotal($get, $set);
                    }),


            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha')
                    ->date()

                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.nombre_cliente')
                    ->sortable(),
                Tables\Columns\TextColumn::make('clientes.apellido_cliente')
                    ->sortable(),
                Tables\Columns\TextColumn::make('descuento')
                    ->numeric()
                    ->suffix(' %')

                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
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
                tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success')
                   // ->icon('heroicon-s-download')
                    ->action(function (Model $record) {
                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('pdf', ['record' => $record])
                            )->stream();
                        },'comprobante'. $record->id . '.pdf');
                    }),
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
            'index' => Pages\ListVentas::route('/'),
            'create' => Pages\CreateVenta::route('/create'),
            'view' => Pages\ViewVenta::route('/{record}'),
            'edit' => Pages\EditVenta::route('/{record}/edit'),
        ];
    }
    public static function updateLineTotal(Forms\Get $get, Forms\Set $set): void {
        $lineTotal = $get('ventadets.cantidad') * $get('ventadets.precio');

        $set('subtotal', number_format($lineTotal, 2, '.', ''));
    }

    public static function updateTotals(Forms\Get $get, Forms\Set $set): void {
        $lineItems = $get('ventadets');

        $subtotal1 = 0;
        foreach($lineItems as $item) {
            $linetotal = ($item['cantidad'] * $item['precio']);
        /*    if($item['discount_type'] === 'fixed') {
                $linetotal -= $item['discount'];
            } else {
                $linetotal -= ($item['discount'] / 100 * $linetotal);
            }*/

            $subtotal1 += $linetotal;

        }

        //$set('sub_total', number_format($subtotal, 2, '.', ''));
        //$set('total', number_format($subtotal - ($subtotal - ($get('discount'))) + ($subtotal * ($get('tax') / 100)), 2, '.', ''));
        $set('total', number_format($subtotal1 -($subtotal1 * $get('descuento')/100), 2, '.', ''));

    }
    public static function updatepagos(Forms\Get $get, Forms\Set $set): void {
        $lineItems = $get('movimientos');
        $subtotal1 = 0;
        foreach($lineItems as $item) {


            $subtotal1 += $item['importe'];

        }
        $set('totalpagado', number_format($subtotal1, 2, '.', ''));

    }
}
