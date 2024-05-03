<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GymResource\Pages;
use App\Filament\Resources\GymResource\RelationManagers;
use App\Models\Gym;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GymResource extends Resource
{
    protected static ?string $model = Gym::class;
    protected static ?string $navigationGroup = "Gyms";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('longitud')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('latitud')
                    ->required()
                    ->numeric(),
                Forms\Components\RichEditor::make('descripcion')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('imagen')
                ->required()
                ->image(),
                Forms\Components\Select::make('categorias_id')
                    ->required()
                    ->relationship('categorias','nombre')
                    ->searchable()
                    ->preload(),
                Forms\Components\Repeater::make('gym_user')
                    ->relationship()
                    ->schema([
                    Forms\Components\Select::make('user_id')
                        ->required()
                        ->relationship(
                            name: 'users',
                            titleAttribute: 'name',
                            )
                        ->searchable()
                        ->preload(),
                    ])
                    //->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('longitud')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('latitud')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categorias.nombre')
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
            'index' => Pages\ListGyms::route('/'),
            'create' => Pages\CreateGym::route('/create'),
            'view' => Pages\ViewGym::route('/{record}'),
            'edit' => Pages\EditGym::route('/{record}/edit'),
        ];
    }
}
