<?php

namespace App\Filament\Resources\Patients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PatientsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
            ]);
    }
}
