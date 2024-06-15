<?php

namespace App\Filament\Clientesadmin\Resources\DietaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DietadetRelationManager extends RelationManager
{
    protected static string $relationship = 'dietadets';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('comidas.preparacion')
            ->columns([
                Tables\Columns\TextColumn::make('comidas.nombre'),
                Tables\Columns\TextColumn::make('horario'),
                Tables\Columns\TextColumn::make('cantidad')
                ->label('Porcion')
                ,
                Tables\Columns\TextColumn::make('comidas.preparacion')->html(),
                
            ])
            ->filters([
                //
            ])
            ->headerActions([
              //  Tables\Actions\CreateAction::make(),
            ])
            ->actions([
              //  Tables\Actions\EditAction::make(),
              //  Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                //    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
