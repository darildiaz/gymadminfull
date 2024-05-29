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
use Illuminate\Database\Eloquent\Model;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
use App\Models\impuesto;
class FacturaResource extends Resource
{
    protected static ?string $model = Factura::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "facturacion";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha')
                //->readonly()
                ->default(now())
                ->required(),
                Forms\Components\Select::make('datosfacturas_id')
                    ->required()
                    ->default(1)
                    ->relationship(
                        name: 'datosfacturas',
                        titleAttribute: 'timbrado',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())->where('activo',true))
                    ->searchable()
                    ->preload(),
                   /* Forms\Components\TextInput::make('sucursal1')
                    ->disabled()

                    //->default()
                    ->maxLength(255),*/
                
                Forms\Components\TextInput::make('nfactura')
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
                    //->default(1)
                        ->preload()
                    ->live(),
                    Forms\Components\Section::make()
                    ->schema([
                    Forms\Components\Repeater::make('facturadets')
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('cantidad')
                            ->required()
                            ->default(1)
                            ->afterStateUpdated(function ( Forms\Set $set,Forms\get $get)  {
                              //  self::updateLineTotal($get, $set);
                             //   $set('subtotal', $get('cantidad')*$get('precio'));
                            })
                            ->live(onBlur: true)
                            ->numeric(),
                            Forms\Components\TextInput::make('descripcion')
                            ->required()
                            //->default(1)
                            ->live(onBlur: true),

                        Forms\Components\Select::make('impuestos_id')
                            ->required()
                            ->relationship(
                                name: 'impuestos',
                                titleAttribute: 'nombre',
                                //modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant())
                                )
                            ->searchable()
                            ->live(onBlur: true)
                            ->preload(),

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
				//    self::updateLineTotal($get, $set);
				    self::updateImpuesto($get, $set);
                })
                ->columns(4),
                ])->columns(1),
                Forms\Components\TextInput::make('valorFactura')
                ->required()
                //->disabled()
                ->numeric(),
            Forms\Components\TextInput::make('valorImpuesto')
                ->required()
              //  ->disabled()

                ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('datosfacturas.timbrado')
                    ->numeric()
                    ->sortable(),
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
           //     Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf')
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
            'index' => Pages\ListFacturas::route('/'),
            'create' => Pages\CreateFactura::route('/create'),
            'view' => Pages\ViewFactura::route('/{record}'),
         //   'edit' => Pages\EditFactura::route('/{record}/edit'),
        ];
    }
    public static function updateLineTotal(Forms\Get $get, Forms\Set $set): void {
        $lineTotal = $get('ventadets.cantidad') * $get('ventadets.precio');

        $set('subtotal', number_format($lineTotal, 2, '.', ''));
    }

    public static function updateTotals(Forms\Get $get, Forms\Set $set): void {
        $lineItems = $get('facturadets');

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
        $set('valorFactura', number_format($subtotal1 , 2, '.', ''));

    }
    public static function updateImpuesto(Forms\Get $get, Forms\Set $set): void {
        $lineItems = $get('facturadets');

        $impuesto = 0;
        foreach($lineItems as $item) {
            $linetotal = ($item['cantidad']*$item['precio']);
           if (!empty($item['impuestos_id'])) {
            $valor = impuesto::find($item['impuestos_id'])->valor;
            $impuesto += $linetotal*$valor/(100+$valor);
            }
    }
    
    $impuestoRedondeado = ceil($impuesto);

    // Asignar el valor calculado de impuestos formateado
    $set('valorImpuesto', number_format($impuestoRedondeado, 2, '.', ''));
       // $set('valorImpuesto', number_format(($impuesto ), 2, '.', ''));

    }
}
