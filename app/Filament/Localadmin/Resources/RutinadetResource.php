<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\RutinadetResource\Pages;
use App\Filament\Localadmin\Resources\RutinadetResource\RelationManagers;
use App\Models\Rutinadet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters;
class RutinadetResource extends Resource
{
    protected static ?string $model = Rutinadet::class;
    protected static ?string $navigationGroup = "Rutinas";
    protected static ?string $navigationLabel = "Detalle de rutina";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('rutina_id')
                    ->relationship('rutina', 'id')
                    ->required(),
                Forms\Components\Select::make('ejercicios_id')
                    ->relationship('ejercicios', 'id')
                    ->required(),
                Forms\Components\TextInput::make('repeticion')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('descanso')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rutina.fecha_emision')
                    ->label('Fecha')    
                    ->date()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rutina.clientes.nombre_cliente')
                    ->label('Nombre cliente')    
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('rutina.clientes.apellido_cliente')
                ->label('Apellido cliente')    

                    ->sortable()
                    ->searchable(),
                    Tables\Columns\TextColumn::make('rutina.actividads.Descripcion')
                ->label('Actividad')    
                   
                    ->searchable()

                    ->sortable(),
                   
                Tables\Columns\TextColumn::make('ejercicios.nombre_ejercicio')
                   
                    ->searchable()

                    ->sortable(),
                Tables\Columns\TextColumn::make('ejercicios.maquinas.nombre', 'maquina')
                ->searchable()

                    ->sortable(),
                Tables\Columns\TextColumn::make('repeticion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descanso')
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
                    
                Filters\Filter::make('fecha')
                ->form([
                    Forms\Components\DatePicker::make('from_date')
                        ->label('Desde'),
                    Forms\Components\DatePicker::make('to_date')
                        ->label('Hasta'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['from_date'], function (Builder $query, $date) {
                            $query->whereHas('rutina', function (Builder $query) use ($date) {
                                $query->whereDate('fecha_emision', '>=', $date);
                            });
                        })
                        ->when($data['to_date'], function (Builder $query, $date) {
                            $query->whereHas('rutina', function (Builder $query) use ($date) {
                                $query->whereDate('fecha_emision', '<=', $date);
                            });
                        });
                }),
                Filters\SelectFilter::make('cliente')
                ->relationship('rutina.clientes', 'nombre_cliente')
                ->label('Cliente'),
                Filters\SelectFilter::make('actividad')
                ->relationship('ejercicios', 'nombre_ejercicio')
                ->label('Actividad'),
                    
            ])
            ->actions([
               // Tables\Actions\ViewAction::make(),
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                  //  Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRutinadets::route('/'),
            'create' => Pages\CreateRutinadet::route('/create'),
            'view' => Pages\ViewRutinadet::route('/{record}'),
            'edit' => Pages\EditRutinadet::route('/{record}/edit'),
        ];
    }
}
