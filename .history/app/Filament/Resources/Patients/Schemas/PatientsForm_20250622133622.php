<?php

namespace App\Filament\Resources\Patients\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;

class PatientsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([]);
    }
}
