<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\ClienteResource\Pages;
use App\Filament\Localadmin\Resources\ClienteResource\RelationManagers;
use App\Models\Cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Hash;

class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
  //  protected static ?string $navigationLabel = "Clientes";
    protected static ?string $navigationGroup = "Clientes";
    protected static ?string $tenantRelationshipName= 'clientes';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('users_id')
                ->unique()
                ->hiddenOn('edit')
                    ->required()
                    ->relationship(
                        name: 'users',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()))
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                ->unique()
                ->hiddenOn('edit')

                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->unique()
                ->hiddenOn('edit')

                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))

                ->hiddenOn('edit')

                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('roles')
                    ->multiple()
                    
                    ->relationship(
                        name: 'roles',
                        titleAttribute: 'name',
                        modifyQueryUsing: function ($query, $get) {
                            $query->where('name', '!=', 'super');
                        }
                    )
                    ->pivotData([
                        'is_primary' => true,
                    ]),
                   
                    Forms\Components\Hidden::make('gym_id')
                    ->default(Filament::getTenant()->id),
                    
                        ])
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('nombre_cliente')
                ->required()
                ->maxLength(191),
            Forms\Components\TextInput::make('apellido_cliente')
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
            Forms\Components\TextInput::make('peso')
                ->required()
                ->suffix(' Kg')


                ->numeric(),
            Forms\Components\TextInput::make('altura')
                ->required()
                ->suffix('M')
                ->numeric(),
            
                Forms\Components\TextInput::make('ruc')
                        ->required()
                        ->maxLength(15),
                Forms\Components\TextInput::make('razonsocial')
                                ->required()
                                ->maxLength(15),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('users.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono_emergencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('peso')
                    ->numeric()
                    ->suffix(' Kg')

                    ->sortable(),
                Tables\Columns\TextColumn::make('altura')
                    ->numeric()
                    ->suffix(' M')

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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'view' => Pages\ViewCliente::route('/{record}'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
