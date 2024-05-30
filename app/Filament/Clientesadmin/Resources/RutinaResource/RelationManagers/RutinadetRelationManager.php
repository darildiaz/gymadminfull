<?php

namespace App\Filament\Clientesadmin\Resources\RutinaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\ejercicio;

class RutinadetRelationManager extends RelationManager
{
    protected static string $relationship = 'rutinadets';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                /*Forms\Components\TextInput::make('rutinadet')
                    ->required()
                    ->maxLength(255),*/
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ejercicios')
            ->columns([
                Tables\Columns\TextColumn::make('ejercicios.nombre_ejercicio'),
                Tables\Columns\TextColumn::make('ejercicios.descripcion_ejercicio')->html(),
                Tables\Columns\TextColumn::make('repeticion'),
                Tables\Columns\TextColumn::make('descanso'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make('detalle')->form([
                    Forms\Components\TextInput::make('ejercicios_id')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('ejercicios.nombre_ejercicio')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('repeticion')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('descanso')
                        ->required()
                        ->maxLength(255),
                    ]),
             //   Tables\Actions\Action::make('detalle'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
