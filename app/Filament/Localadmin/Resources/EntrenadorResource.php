<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\EntrenadorResource\Pages;
use App\Filament\Localadmin\Resources\EntrenadorResource\RelationManagers;
use App\Models\Entrenador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class EntrenadorResource extends Resource
{
    protected static ?string $model = Entrenador::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Gyms";
    protected static ?string $tenantRelationshipName= 'entrenadors';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('users_id')
                    ->unique()
                    ->required()
                    ->relationship(
                        name: 'users',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('nombre_entrenador')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('apellido_entrenador')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('telefono_emergencia')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->required()
                    ->maxLength(15),
                Forms\Components\Select::make('Sexo')
                    ->required()
                    ->options([
                        'femenino' => 'Femenino',
                        'masculino' => 'Masculino',
                        'otro' => 'Otro',
                        ]),
                Forms\Components\RichEditor::make('especialidad')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('users.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_entrenador')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_entrenador')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono_emergencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Sexo')
                    ->searchable(),
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
            'index' => Pages\ListEntrenadors::route('/'),
            'create' => Pages\CreateEntrenador::route('/create'),
            'view' => Pages\ViewEntrenador::route('/{record}'),
            'edit' => Pages\EditEntrenador::route('/{record}/edit'),
        ];
    }
}
