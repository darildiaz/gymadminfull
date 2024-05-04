<?php

namespace App\Filament\Localadmin\Resources\UserResource\Pages;

use App\Filament\Localadmin\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
