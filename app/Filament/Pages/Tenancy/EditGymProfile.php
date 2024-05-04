<?php
namespace App\Filament\Pages\Tenancy;

use App\Models\Gym;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms;
//use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditGymProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Editar gym';
    }

    public function form(Form $form): Form
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
                       ]);
    }

    protected function handleRegistration(array $data): Gym
    {
        $team = Gym::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
