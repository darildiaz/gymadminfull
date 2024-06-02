<?php

namespace App\Filament\Localadmin\Resources;

use App\Filament\Localadmin\Resources\UserResource\Pages;
use App\Filament\Localadmin\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = "Usuarios";
   protected static ?string $navigationGroup = "Gyms";

   protected static ?string $tenantRelationshipName= 'users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                    ,
             ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->searchable()
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
   //             Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('verificar')
                    ->icon('heroicon-m-check-badge')
                    ->action(function(User $user){
                        $user->email_verified_at = Date ('Y-m-d H:i:s');
                    }),
  
   Tables\Actions\Action::make('changePassword')
           ->action(function (User $record, array $data): void {
               $record->update([
                   'password' => Hash::make($data['new_password']),
               ]);

               //Filament::notify('success', 'Password changed successfully.');
           })
           ->form([
               Forms\Components\TextInput::make('new_password')
                   ->password()
                   ->label('New Password')
                   ->required()
                   ->rule(Password::default()),
               Forms\Components\TextInput::make('new_password_confirmation')
                   ->password()
                   ->label('Confirm New Password')
                   ->rule('required', fn($get) => ! ! $get('new_password'))
                   ->same('new_password'),
           ])
           ->icon('heroicon-o-key'),
  //         ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR),
       Tables\Actions\Action::make('deactivate')
           ->color('danger')
           ->icon('heroicon-o-trash')
           ->action(fn (User $record) => $record->delete())
    //       ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
