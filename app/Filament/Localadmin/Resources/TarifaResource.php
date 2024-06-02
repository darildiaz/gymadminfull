<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\TarifaResource\Pages;
use App\Filament\Localadmin\Resources\TarifaResource\RelationManagers;
use App\Models\Tarifa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class TarifaResource extends Resource
{
    protected static ?string $model = Tarifa::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-bangladeshi';
    protected static ?string $navigationGroup = "pagos";
    protected static ?string $tenantRelationshipName= 'tarifas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('actividads_id')
                    ->required()
                    ->relationship(
                        name: 'actividads',
                        titleAttribute: 'descripcion',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('dias')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('precio')
                    ->required()
                    ->suffix('Gs.')
                    ->numeric(),
                Forms\Components\Section::make('datos facturacion')
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
                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actividads.Descripcion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dias')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('precio')
                    ->numeric()
                    ->suffix('Gs.')
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
            'index' => Pages\ListTarifas::route('/'),
            'create' => Pages\CreateTarifa::route('/create'),
            'view' => Pages\ViewTarifa::route('/{record}'),
            'edit' => Pages\EditTarifa::route('/{record}/edit'),
        ];
    }
}
